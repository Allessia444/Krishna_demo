<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
class DashboardController extends Controller
{
     public function blog_list()
    {
    	$blogs = Blog::orderBy('name','id')->get();
        return view('blog_list', compact('blogs'));
    }
    public function blog_view($blog_id)
    {
    	$blog = Blog::find($blog_id);
        return view('blog_view', compact('blog'));
    }
}
