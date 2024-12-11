<?php
namespace App\Http\Controllers\websiteController;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\models\Product;
use App\models\Category;


class HomeController extends Controller
{
    public function home(Request $request)
    {   
        $AllCategory= Category::where('status',1)->get();

        $AllProduct= Product::where('status',1)->get();

        $LatestProduct= Product::where('status',1)->get();
        $TopProduct= Product::where('status',1)->get();
        $ReviewProduct= Product::where('status',1)->get();

         return view("website.index",[
            
            "AllCategory"=>$AllCategory,
            "AllProduct"=>$AllProduct,
            "LatestProduct"=>$LatestProduct,
            "TopProduct"=>$TopProduct,
            "ReviewProduct"=>$ReviewProduct
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
