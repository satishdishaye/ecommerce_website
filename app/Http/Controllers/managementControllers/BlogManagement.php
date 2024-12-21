<?php

namespace App\Http\Controllers\managementControllers;
use App\Http\Controllers\Controller; 

use App\models\Blog;
use App\models\BlogCategory;


use Illuminate\Http\Request;

class BlogManagement extends Controller
{
    public function blogCategory(Request $request)
    {
       
        $query = BlogCategory::where('status', 1);
    
        if ($request->search) {
            $query->search($request->search);
        }
    
        $all_blog_category = $query->get();

       
    
        return view("management.blog-category", ["all_blog_category" => $all_blog_category]);
    }
    
    public function addBlogCategory(Request $request)
    {  

        $request->validate([
            "category_name"=>'required|string',
            "status"=>'required',

        ]);

        $category= new BlogCategory();
        $category->category_name=$request->category_name;
        $category->status=$request->status;

      
        if($category->save()){
            return redirect()->back()->with(['success'=>"Blog Category added Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Blog Please Re-Enter Data !"]);

        }
    }

    public function updateBlogCategory(Request $request)
    {  
        $request->validate([
            "update_category"=>'required|string',
            "status"=>'required',

        ]);

        $category= BlogCategory::where("id",$request->id)->first();
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

    public function deleteBlogCategory(Request $request ,$cat_id)
    {  
        $category= BlogCategory::where("id",$cat_id)->first();

        if($category->delete()){
            return redirect()->back()->with(['success'=>"Category deleted Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }


    public function blogManagement(){
         
        $blog=Blog::with("category")->get();
        $blogCategory=BlogCategory::where('status',1)->get();
        return view('management.blog-management',["blog"=>$blog,"Category"=>$blogCategory]);
    }
    public function addBlog(Request $request)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'content' => 'required',
            'image' => 'required|image', 
            'categories' => 'required', 
        ]);
    
        // Create a new blog instance
        $blog = new Blog();
        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->published_at = now(); 
        $blog->comments_count = $request->comments_count ?? 0; 
        $blog->content = $request->content;
        $blog->excerpt = $request->excerpt ?? ''; 
        $blog->categories = json_encode($request->categories); 
        $blog->tags = json_encode($request->tags); 
    
        if ($request->hasFile('image')) {
            if ($blog->image) {
                @unlink(storage_path('app/' . $blog->image));
            }
            $blog->image = $request->file('image')->store('public/blog', 'public');
        }
    
        if ($request->hasFile('author_image')) {
            if ($blog->author_image) {
                @unlink(storage_path('app/' . $blog->author_image)); 
            }
            $blog->author_image = $request->file('author_image')->store('public/authors', 'public');
        }
    
       
        if ($blog->save()) {
            return redirect()->back()->with('success', 'Blog Created!');
        } else {
            return redirect()->back()->with('error', 'Please enter valid data!');
        }
    }
    
    public function updateBlog(Request $request){


        $request->validate([
            "id"=>"required",
            "update_categories"=>"required",
            "update_title"=>"required",
            "update_content"=>"required",
            "update_tags"=>"required",
        ]);
        



        $blog=Blog::where('id',$request->id)->first();
        $blog->title = $request->update_title;
        $blog->author = $request->update_author;
        $blog->content = $request->update_content;
        $blog->excerpt = $request->update_excerpt ?? ''; 
        $blog->categories = $request->update_categories; 
        $blog->tags = json_encode($request->update_tags); 
    
        if ($request->hasFile('update_image')) {
            if ($blog->image) {
                @unlink(storage_path('app/' . $blog->image));
            }
            $blog->image = $request->file('update_image')->store('public/blog', 'public');
        }
    
        if ($request->hasFile('update_author_image')) {
            if ($blog->author_image) {
                @unlink(storage_path('app/' . $blog->author_image)); 
            }
            $blog->author_image = $request->file('update_author_image')->store('public/authors', 'public');
        }
    


        if($blog->save()){
            return redirect()->back()->with(['success'=>"Blog updated !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please enter valid data !"]);

        }
    }


    public function deleteBlog(Request $request ,$p_id)
    {  
        $product= Blog::where("id",$p_id)->first();

        if($product->delete()){
            return redirect()->back()->with(['success'=>"Blog deleted Successfully !"]);
        }else{
            return redirect()->back()->with(['error'=>"Please Re-Enter Data !"]);

        }
    }
}
