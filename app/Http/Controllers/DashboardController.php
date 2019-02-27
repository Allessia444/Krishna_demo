<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use App\Task;
use App\BlogCategory;
use App\TaskCategory;
use Illuminate\Support\Facades\Input;
class DashboardController extends Controller
{
     public function blog_list(Request $request)
    {
        $slug = Input::get('slug');

        if($slug != NULL)
        {
            $blog_category_id = BlogCategory::where('slug', '=', $slug)->first()->id;
           $blogs = Blog::where('blog_category_id','=',$blog_category_id)->orderBy('name','id')->get();
        }
        else
        {
           $blogs = Blog::orderBy('name','id')->get();          
        }
        $blog_categories = BlogCategory::whereNotNull('parent_id')->get();
    	//$blogs = Blog::orderBy('name','id')->get();
        return view('blog_list', compact('blogs','slug','blog_categories','request'));
    }
    public function blog_view($blog_id)
    {
    	$blog = Blog::find($blog_id);
        return view('blog_view', compact('blog'));
    }
     public function task_category()
    {
        $task_category = TaskCategory::orderBy('name','id')->pluck('name','id');
        return view('task_category', compact('task_category'));
    }
     public function get_task($task_category_id)
    {
        $tasks = Task::where('task_category_id', '=', $task_category_id)->pluck('name','id');
        return view('render_tasks', compact('tasks'));
    }
      public function get_task_detail($task_id)
    {
        $task_detail = Task::find($task_id);
        return view('render_task_detail', compact('task_detail'));
    }
}
