<?php


namespace App\Http\Controllers\managementControllers;

use App\Http\Controllers\Controller; 
use App\models\Product;
use App\models\Category;
use App\Helpers\ImageHelper;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productManagement(){
         
        $Product=Product::with("category")->where('status',1)->get();
        $Category=Category::where('status',1)->get();
        return view('management.product-management',["Product"=>$Product,"Category"=>$Category]);
    }

    public function addProduct(Request $request){

        $request->validate([
            "cat_id"=>"required",
            "product_name"=>"required",
            "price"=>"required",
            "description"=>"required",
            "status"=>"required",
        ]);
        
        // if($request->product_image){
        //     $path = ImageHelper::FileUploadHelper($request,'product_image',env('PRODUCT_PHOTO_PATH'));

        //     dd( $path );
        // }
        $Product=new Product();
        $Product->cat_id=$request->cat_id;
        $Product->product_name=$request->product_name;
        $Product->price=$request->price;
        $Product->description=$request->description;
        $Product->status=$request->status;

        
        if ($request->hasfile('product_image')) {
            @unlink('storage/app/' . $Product->product_image);
            $Product->image = $request->file('product_image')->store('public');
        }
        if($Product->save()){
            return redirect()->back()->with(['success'=>"Product Created !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please enter valid data !"]);

        }
    }
}
