<?php

namespace App\Http\Controllers\websiteController;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\models\Product;
use App\models\Category;
use Illuminate\Support\Facades\Auth;
use App\models\Order;
use App\models\OrderDetail;


class ShopController extends Controller
{
    public function shopGrid(Request $request)
    {


        $allCategory= Category::where('status',1)->get();

       
        $allProduct= Product::where('status',1);

        if($request->search){
            $allProduct->where('product_name',$request->search);
        }

        if($request->category){
            $allProduct->where('cat_id',$request->category);
        }


        if ($request->minprice || $request->maxprice) {
            // Apply the price range filter
            if ($request->minprice && $request->maxprice) {
                $allProduct->whereBetween('price', [$request->minprice, $request->maxprice]);
            } elseif ($request->minprice) {
                $allProduct->where('price', '>=', $request->minprice);
            } elseif ($request->maxprice) {
                $allProduct->where('price', '<=', $request->maxprice);
            }
        }
        $allProduct=$allProduct->get();

        $latestProduct= Product::where('status',1);


        if ($request->minprice || $request->maxprice) {
            // Apply the price range filter
            if ($request->minprice && $request->maxprice) {
                $latestProduct->whereBetween('price', [$request->minprice, $request->maxprice]);
            } elseif ($request->minprice) {
                $latestProduct->where('price', '>=', $request->minprice);
            } elseif ($request->maxprice) {
                $latestProduct->where('price', '<=', $request->maxprice);
            }
        }
        $latestProduct=$latestProduct->paginate(3);



        $topProduct= Product::where('status',1)->get();
        $reviewProduct= Product::where('status',1)->get();

         return view("website.shop-grid",[
            
            "allCategory"=>$allCategory,
            "allProduct"=>$allProduct,
            "latestProduct"=>$latestProduct,
            "topProduct"=>$topProduct,
            "reviewProduct"=>$reviewProduct
        ]);
    }


    
    public function shopDetails(Request $request)
    {   
        $product_detail= Product::where('status',1)->where("id",$request->id)->first();
        $related_product= Product::where('status',1)->where('cat_id', $product_detail->cat_id)->get();
      
         return view("website.shop-details",[
            "product_detail"=>$product_detail,
            "related_product"=>$related_product,
        ]);
    } 


}
