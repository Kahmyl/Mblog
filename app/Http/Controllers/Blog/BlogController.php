<?php

namespace App\Http\Controllers\Blog;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Models\Blog;

use Inertia\Inertia;

use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
     public function blogs(){
           return Blog::all();
     }

     public function blogDetails(){
         return Blog::where(category, 1)->get();
     }

     public function createBlogs(){
         $blogs = Blog::all();
     }

     public function postBlogs(Request $request){
         $blog = new Blog;
         $blog->user_id = Auth::id();
         $blog->title = $request->title;
         $blog->body = $request->body;
         $blog->category = $request->category;
         if($request->hasfile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $path = $request->file('image')->storeAs($destination, $filename, 's3');
            $blog->image = $filename;
        }
        $blog->save();

     }
}