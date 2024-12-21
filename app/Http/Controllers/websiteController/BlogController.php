<?php

namespace App\Http\Controllers\websiteController;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\models\Product;
use App\models\Category;
use Illuminate\Support\Facades\Auth;
use App\models\Order;
use App\models\OrderDetail;
use App\models\Blog;
use App\models\BlogCategory;


class BlogController extends Controller
{

    public function blog(Request $request)
    {
        
        $blog= Blog::query();

        if ($request->search) {
            $blog->where('title', 'like', '%' . $request->search . '%');
        }

        if($request->category){
            $blog->where('categories', 'like', '%' . $request->category . '%');
        }




        $blog= $blog->paginate(10);
        $blogCategory= BlogCategory::get();

        
         return view("website.blog",[
               "blog"=>$blog,
               "blogCategory"=>$blogCategory,
        ]);
    }


    public function blogDetails(Request $request)
    {

        $blogDetails= Blog::where('id',$request->id)->first();

        $blog= Blog::get();
        $blogCategory= BlogCategory::get();

         return view("website.blog-details",[
               "blog"=>$blog,
               "blogCategory"=>$blogCategory,
               "blogDetails"=>$blogDetails,
        ]);
    }   
}
