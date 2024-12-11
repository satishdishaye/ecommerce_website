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
         
        $Product=Product::with("category")->get();
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
            $Product->image = $request->file('product_image')->store('public/product','public');
        }


        if($Product->save()){
            return redirect()->back()->with(['success'=>"Product Created !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please enter valid data !"]);

        }
    }



    public function updateProduct(Request $request){

        $request->validate([
            "id"=>"required",
            "update_cat_id"=>"required",
            "update_product_name"=>"required",
            "update_price"=>"required",
            "update_description"=>"required",
            "update_status"=>"required",
        ]);
        
        $product=Product::where('id',$request->id)->first();
        $product->cat_id=$request->update_cat_id;
        $product->product_name=$request->update_product_name;
        $product->price=$request->update_price;
        $product->description=$request->update_description;
        $product->status=$request->update_status;

        
        if ($request->hasfile('product_image')) {
            @unlink('storage/app/' . $product->product_image);
            $product->image = $request->file('product_image')->store('public/product','public');
        }


        if($product->save()){
            return redirect()->back()->with(['success'=>"Product updated !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please enter valid data !"]);

        }
    }


    public function deleteProduct(Request $request ,$p_id)
    {  
        $product= Product::where("id",$p_id)->first();

        if($product->delete()){
            return redirect()->back()->with(['success'=>"product deleted Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }
}
