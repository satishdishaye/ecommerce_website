<?php

namespace App\Http\Controllers\websiteController;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\models\Product;
use App\models\Category;
use Illuminate\Support\Facades\Auth;
use App\models\Order;
use App\models\OrderDetail;
use Razorpay\Api\Api;
use App\Jobs\SendPaymentConfirmationEmail;
use Illuminate\Support\Facades\Mail as MailFacade;
use App\Mail\PaymentConfirmationMail;
use App\models\Coupon;



class CartAndCheckoutController extends Controller
{
    
    public function addToCart(Request $request, $productId)
    {

     
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $cart = session()->get('cart', []);

        if (!array_key_exists($productId, $cart)) {
        
            $cart[$productId] = [
                'product_id' => $product->id,
                'quantity' => $request->qty ?? 1,
                
            ];

            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart!');
        }

        return redirect()->back()->with('success', 'Product is already in the cart.');
    }

    public function shopingCard(Request $request)
    {
        $cart = session()->get('cart', []);

        

        $productIds = array_keys($cart); 

        if (!empty($productIds)) {
            $product_details = Product::whereIn('id', $productIds)
                ->where('status', 1) 
                ->get();
        } else {
            $product_details = []; 
        }

        $totalItems = count($cart);

        return view('website.shoping-cart', [
            'product_details' => $product_details,
            'cart' => $cart,
            'totalItems' => $totalItems,
        ]);
    }

    public function updateCart(Request $request)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$request->product_id])) {
            $cart[$request->product_id]['quantity'] = $request->quantity;
            session()->put('cart', $cart);
        

            $product_detail= Product::where('status',1)->where("id",$request->product_id)->first();
            $updatedTotalPrice = $cart[$request->product_id]['quantity'] * $product_detail->price;

            $productIds = array_keys($cart); 

            $updatedCartTotal =0;
            if (!empty($productIds)) {
                $product_details = Product::whereIn('id', $productIds)
                    ->where('status', 1)
                    ->get();
            
                // Calculate the total amount (qty * price) for each product


                foreach ($product_details as $product) {
                    $quantity = $cart[$product->id]['quantity']; // Get the quantity from the cart
                    // $product->total_amount = $product->price * $quantity; 
                    
                    $updatedCartTotal =$updatedCartTotal + ( $product->price * $quantity);

                    
                    // Calculate total amount
                }
                $updatedSubCartTotal=$updatedCartTotal;
                if(session('coupon')){
                    $updatedCartTotal= $updatedCartTotal- $updatedCartTotal*session('coupon')/100;
                }
            }

            return response()->json([
                'updatedTotalPrice' => $updatedTotalPrice,
                'updatedSubCartTotal' => $updatedSubCartTotal,
                'updatedCartTotal' => $updatedCartTotal,
            ]);
        }

        return response()->json(['error' => 'Product not found in cart'], 404);
    }

    public function removeFromCart(Request $request)
    {
        $cart = session()->get('cart', []);
        if (isset($cart[$request->product_id])) {
            unset($cart[$request->product_id]);
            session()->put('cart', $cart);
            $productIds = array_keys($cart); 
            $updatedCartTotal =0;
            if (!empty($productIds)) {
                $product_details = Product::whereIn('id', $productIds)
                    ->where('status', 1)
                    ->get();
                // Calculate the total amount (qty * price) for each product
                foreach ($product_details as $product) {
                    $quantity = $cart[$product->id]['quantity']; // Get the quantity from the cart
                    // $product->total_amount = $product->price * $quantity; 
                    
                    $updatedCartTotal =$updatedCartTotal + ( $product->price * $quantity);
                    // Calculate total amount
                }
            }
            // $updatedCartTotal = array_sum(array_column($cart, 'total')); // Example calculation

            if(session('coupon')){
                $updatedCartTotal= $updatedCartTotal- $updatedCartTotal*session('coupon')/100;
            }

            return response()->json([
                'updatedCartTotal' => $updatedCartTotal,
            ]);
        }

        return response()->json(['error' => 'Product not found in cart'], 404);
    }


    public function applycoupon(Request $request)
    {
        if (Auth::check()) {
            if(session('coupon_code')){

                session()->forget('coupon_code');
                session()->forget('coupon');
                return redirect()->back()->with('success', 'Remove Coupon!');

            }


          $coupon=Coupon::where('code',$request->code)->first();
          if($coupon)
          {
            // $coupon=Order::where('user_id',Auth::id())->where('coupon_code',$request->code)->count();
            $couponDetail=Order::where('user_id',Auth::id())->where('coupon_code',$request->code)->count();

            if($couponDetail < 3){

                session()->put('coupon',intval($coupon->discount));
                session()->put('coupon_code',$coupon->code);
                return redirect()->back()->with('success', 'Coupon Applied !');

            }else{
                return redirect()->back()->with('error', 'Coupon Already Used !');
            }
          }else{
            return redirect()->back()->with('error', 'Invalid Coupon !');
          }
            
        } else {
            // User is not logged in, redirect to login page
            return redirect()->route('user-login'); // Redirect to login page
        }
    }

    public function checkout(Request $request)
    {
        if (Auth::check()) {
            $cart = session()->get('cart', []);

            $productIds = array_keys($cart); 

            if (!empty($productIds)) {
                $product_details = Product::whereIn('id', $productIds)
                    ->where('status', 1) 
                    ->get();
            } else {
                $product_details = []; 
            }

            $totalAmount=0;
            foreach ($product_details as $product) {
                $quantity = $cart[$product->id]['quantity']; // Get the quantity from the cart
                // $product->total_amount = $product->price * $quantity; 
                
                $totalAmount =$totalAmount + ( $product->price * $quantity);
                // Calculate total amount
            }

            $totalItems = count($cart);
            // dd($totalItems);
            // dd()

            $SubtotalAmount=$totalAmount;
            if(session('coupon')){
                $totalAmount= $totalAmount- $totalAmount*session('coupon')/100;
            }

            return view('website.checkout', [
                'product_details' => $product_details,
                'cart' => $cart,
                'SubtotalAmount' => $SubtotalAmount,
                'totalAmount' => $totalAmount,
            ]);
            
        } else {
            // User is not logged in, redirect to login page
            return redirect()->route('user-login'); // Redirect to login page
        }
    }
    public function postCheckout(Request $request)
    {
        if (Auth::check()) {
            // Validate input fields
            $validated = $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'address' => 'required|string|max:255',
                'address_line_2' => 'nullable|string|max:255',
                'city' => 'required|string|max:255',
                'state' => 'required|string|max:255',
                'postcode' => 'required|string|max:10',
                'phone' => 'required|string|max:15',
                'email' => 'required|email|max:255',
                'order_notes' => 'nullable|string',
            ]);

            // Retrieve cart from session
            $cart = session()->get('cart', []);

            if (empty($cart)) {
                return redirect()->back()->with('error', 'Your cart is empty.');
            }

            // Get product details for items in the cart
            $productIds = array_keys($cart);
            $productDetails = Product::whereIn('id', $productIds)
                ->where('status', 1) // Ensure products are active
                ->get();

            if ($productDetails->isEmpty()) {
                return redirect()->back()->with('error', 'Some products are no longer available.');
            }
            $totalAmount = 0;
            foreach ($productDetails as $product) {
                $quantity = $cart[$product->id]['quantity'];
                $totalAmount += $product->price * $quantity;
            }

            $SubtotalAmount=$totalAmount;
            if(session('coupon')){
                $totalAmount= $totalAmount- $totalAmount*session('coupon')/100;
            }
            $exitOrder = Order::where('user_id', Auth::id())->where('status','pending')->delete();
           
            // Create a new order
            $order = Order::create([
                'user_id' => Auth::id(),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'country' => $request->country,
                'address' => $request->address,
                'address_line_2' => $request->address_line_2,
                'city' => $request->city,
                'state' => $request->state,
                'postcode' => $request->postcode,
                'phone' => $request->phone,
                'email' => $request->email,
                'order_notes' => $request->order_notes,
                'subtotal' => $SubtotalAmount,
                'coupon_code' => session('coupon_code'),
                'total' => $totalAmount,
                'payment_method' => $request->payment_method ?? 'check',
                'status' => 'pending',
            ]);
        
            session()->forget('coupon_code');
            session()->forget('coupon');

            // Save order details
            foreach ($productDetails as $product) {
                OrderDetail::create([
                    'order_id' => $order->id,
                    'product_id' => $product->id,
                    'quantity' => $cart[$product->id]['quantity'],
                    'price' => $product->price,
                    'total' => $product->price * $cart[$product->id]['quantity'],
                ]);
            }


             // Integrate Razorpay payment
            $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

            // dd($order);

            $razorpayOrder = $api->order->create([
                'receipt' => 'order_rcptid_' . $order->id,
                 'amount' => (int) $order->total * 100,
                'currency' => 'INR',
            ]);
            

            // dd($razorpayOrder['id']);
            // $order->update(['razorpay_order_id' => $razorpayOrder['id']]);

            // Pass necessary data to the payment view

            session()->forget('coupon_code');
            session()->forget('coupon');

            return view('payment.razorpay.razorpay-checkout', [
                'order' => $order,
                'razorpayOrderId' => $razorpayOrder['id'],
                'totalAmount' => $totalAmount * 100, // Amount in paise
                'razorpayKey' => env('RAZORPAY_KEY'),
            ]);
            // Clear the cart from session
            // Redirect with success message
            return redirect('/')->with('success', 'Checkout successful! Your order has been placed.');
        }

        return redirect()->route('login')->with('error', 'You must be logged in to checkout.');
    }
    public function verifyPayment(Request $request)
    {
        $input = $request->all();
    
        $api = new \Razorpay\Api\Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        try {
            // Verify payment signature
            $api->utility->verifyPaymentSignature([
                'razorpay_order_id' => $input['order_id'],
                'razorpay_payment_id' => $input['payment_id'],
                'razorpay_signature' => $input['signature']
            ]);

            // Payment is valid, update the order status
            $order = Order::where('id', $input['main_order_id'])->first();
            $order->status = 'completed';
            $order->payment_id = $input['payment_id'];
            $order->save();
            // SendPaymentConfirmationEmail::dispatch($order);
            MailFacade::to($order->email)->send(new PaymentConfirmationMail($order ));


            session()->forget('cart');

            return response()->json(['status' => 'success']);
        } catch (\Exception $e) {


        $order = Order::where('id', $input['main_order_id'])->first();
        $order->status = 'failed';
        $order->payment_id = $input['payment_id'];
        $order->save();
        // Payment failed, handle the error
        return response()->json(['status' => 'failed']);
      }
    }

    public function addFavorite(Request $request, $productId)
    { 
        $product = Product::find($productId);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $favorite = session()->get('favorite', []);

        if (!array_key_exists($productId, $favorite)) {
        
            $favorite[$productId] = [
                'product_id' => $product->id,
                
            ];

            session()->put('favorite', $favorite);
            return redirect()->back()->with('success', 'Product added to favorite!');
        }

        unset($favorite[$productId]);

        // Update the session
        session()->put('favorite', $favorite);
    
        return redirect()->back()->with('success', 'Product removed from favorite!');

    }
}
