<?php
namespace App\Http\Controllers\websiteController;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\models\Product;
use App\models\Category;
use Illuminate\Support\Facades\Auth;
use App\models\Order;
use App\models\OrderDetail;
use Illuminate\Support\Facades\Route;
use App\models\Blog;

class HomeController extends Controller
{
    public function home(Request $request)
    {   
        $formAction = Route::has('shop-grid');

        // dd( Route::currentRouteName());

        $AllCategory= Category::where('status',1)->get();

        $allProduct= Product::where('status',1);

        if($request->search){
            $allProduct->where('product_name',$request->search);
        }

        if($request->category){
            $allProduct->where('cat_id',$request->category);
        }

        $LatestProduct= Product::where('status',1)->get();
        $TopProduct= Product::where('status',1)->get();
        $ReviewProduct= Product::where('status',1)->get();
  
        $allProduct=$allProduct->get();
        $blog= Blog::get();

         return view("website.index",[
            
            "AllCategory"=>$AllCategory,
            "AllProduct"=>$allProduct,
            "LatestProduct"=>$LatestProduct,
            "TopProduct"=>$TopProduct,
            "ReviewProduct"=>$ReviewProduct,
            "blog"=>$blog
        ]);
    } 



    public function getFavoriteProduct(Request $request)
    {   
        $formAction = Route::has('shop-grid');

        // dd( Route::currentRouteName())
        $AllCategory= Category::where('status',1)->get();
        $favorite = session()->get('favorite', []);
        $productIds = array_keys($favorite); 

        if (!empty($productIds)) {
            $allProduct = Product::whereIn('id', $productIds)
                ->where('status', 1) 
                ->get();
        } else {
            $allProduct = []; 
        }

       

        $LatestProduct= Product::where('status',1)->get();
        $TopProduct= Product::where('status',1)->get();
        $ReviewProduct= Product::where('status',1)->get();
  
        $blog= Blog::get();

         return view("website.index",[
            
            "AllCategory"=>$AllCategory,
            "AllProduct"=>$allProduct,
            "LatestProduct"=>$LatestProduct,
            "TopProduct"=>$TopProduct,
            "ReviewProduct"=>$ReviewProduct,
            "blog"=>$blog
        ]);
    } 



    public function getProductsByCategory(Request $request)
    {   
      
        $allProduct= Product::where('status',1);

        if($request->category){
            $allProduct->where('cat_id',$request->category);
        }



        $allProduct=$allProduct->get();


        $response = $allProduct->map(function ($product) {
            return [
                'id' => $product->id,
                'product_name' => $product->product_name,
                'price' => $product->price,
                'image' => $product->image, // Correct string concatenation using the dot operator
            ];
        });


        return response()->json($response);


      
    } 

}
