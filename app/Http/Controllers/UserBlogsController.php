<?php

namespace App\Http\Controllers;

use App\Blog;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use App\BlogCategory;
use Image;
use Former;
class UserBlogsController extends Controller
{
    // List all user experience of perticular user
    public function index()
    {
        //$blogs = BlogCategory::whereNotNull('parent_id')->pluck('name','id');
        $blogs = Blog::where('user_id', '=', Auth::user()->id)->orderBy('id')->get();
        return view('blogs.index',compact('users','blogs','user_id'));
    }

    // Create user experience
    public function create()
    {   
        $blogs = BlogCategory::whereNotNull('parent_id')->pluck('name','id');
        return view('blogs.add', compact('blogs','user_id'));
    }

    // Save user experience
    public function store(Request $request)
    {

         // Rules for validation
        $rules=[
            
        ];
        // Make validator with rules 
        $validator = Validator::make($request->all(),$rules);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        // If no error than go inside otherwise go to the catch section
        // try
        // {
            $blog = New Blog;
            $blog->user_id = Auth::user()->id;
            $blog->blog_category_id = $request->get('blog_category_id');
            $blog->name = $request->get('name');
            $blog->description = $request->get('description');
            $blog->photo = $request->get('photo');
            $blog->status = $request->get('status');
            $blog->save();
             return redirect()->route('blogs.index')->withSuccess("User Exception has been inserted successfully.");     
        // }
        // catch(\Exception $e)
        // {
        //     return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        // }
    }

    // Show user experience
    public function show($id)
    {
        $blog = Blog::find($id);
        return view('blogs.show',compact('blog'));
    }

    // Edit user experience
    public function edit($id)
    {
         $blog_category = BlogCategory::whereNotNull('parent_id')->pluck('name','id');
         $blog = Blog::find($id);
          Former::populate($blog);
        return view('blogs.edit', compact('blog','blog_category'));
    }

    // Update user experience
    public function update(Request $request, $id )
    {
        // Rules for validation
        $rules=[
            
        ];
        // Make validator with rules 
        $validator = Validator::make($request->all(),$rules);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        // If no error than go inside otherwise go to the catch section
        // try
        // {
            $blog = Blog::find($id);
            $blog->user_id = Auth::user()->id;
            $blog->blog_category_id = $request->get('blog_category_id');
            $blog->name = $request->get('name');
            $blog->description = $request->get('description');
            $blog->photo = $request->get('photo');
            $blog->status = $request->get('status');
            $blog->save();
             return redirect()->route('blogs.index')->withSuccess("User Exception has been inserted successfully.");     
        // }
        // catch(\Exception $e)
        // {
        //     return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        // }
    }

     // Delete  user experience
    public function destroy($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
      return redirect()->route('blogs.index')->withSuccess('Deleted successfully.');
    }
}
