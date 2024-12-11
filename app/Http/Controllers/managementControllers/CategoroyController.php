<?php
namespace App\Http\Controllers\managementControllers;
use App\Http\Controllers\Controller; 


use Illuminate\Http\Request;

use App\models\Category;

class CategoroyController extends Controller
{
    public function categoryManagement(Request $request)
    {
       
        $query = Category::where('status', 1);
    
        if ($request->search) {
            $query->search($request->search);
        }
    
        $all_category = $query->get();

       
    
        return view("management.category-management", ["all_category" => $all_category]);
    }
    

    public function addCategory(Request $request)
    {  

        $request->validate([
            "category_name"=>'required|string',
            "status"=>'required',

        ]);

        $category= new Category();
        $category->category_name=$request->category_name;
        $category->status=$request->status;

         
        if ($request->hasfile('category_image')) {
            @unlink('storage/app/' . $category->image);
            $category->image = $request->file('category_image')->store('public/category','public');
        }

        

        if($category->save()){
            return redirect()->back()->with(['success'=>"Category added Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }

    public function updateCategory(Request $request)
    {  
        $request->validate([
            "update_category"=>'required|string',
            "status"=>'required',

        ]);

        $category= Category::where("id",$request->id)->first();
        $category->category_name=$request->update_category;
        $category->status=$request->status;

         
        if ($request->hasfile('update_category_image')) {
            @unlink('storage/app/' . $category->image);
            $category->image = $request->file('update_category_image')->store('public/category','public');
        }

        

        if($category->save()){
            return redirect()->back()->with(['success'=>"Category updated Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }

         return view("management.category-management");
    }

    public function deleteCategory(Request $request ,$cat_id)
    {  
        $category= Category::where("id",$cat_id)->first();

        if($category->delete()){
            return redirect()->back()->with(['success'=>"Category deleted Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }
}
