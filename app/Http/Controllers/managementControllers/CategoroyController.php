<?php
namespace App\Http\Controllers\managementControllers;
use App\Http\Controllers\Controller; 


use Illuminate\Http\Request;

use App\models\Category;

class CategoroyController extends Controller
{
    public function categoryManagement(Request $request)
    {  
        $AllCategory= Category::where('status',1)->get();

         return view("management.category-management",["AllCategory"=>$AllCategory]);
    }

    public function addCategory(Request $request)
    {  

        $request->validate([
            "category_name"=>'required|string',
            "status"=>'required',

        ]);

        $Category= new Category();
        $Category->category_name=$request->category_name;
        $Category->status=$request->status;
        

        if($Category->save()){
            return redirect()->back()->with(['success'=>"Category added Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }

    public function updateCategory(Request $request)
    {  
         return view("management.category-management");
    }

    public function deleteCategory(Request $request)
    {  
         return view("management.category-management");
    }
}
