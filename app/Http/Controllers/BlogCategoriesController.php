<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\BlogCategory;
use Validator;
use Former;

class BlogCategoriesController extends Controller
{
    //List project categories
    public function index()
    {   
        $blog_categories = BlogCategory::whereNotNull('parent_id')->orderBy('name')->get();
        return view('blog_categories.index',compact('blog_categories'));
    }
    //Create project blog_category
    public function create()
    {
        $blog_categories = BlogCategory::whereNull('parent_id')->orderBy('name')->pluck('name','id');
        return view('blog_categories.add', compact('blog_categories'));
    }
    //Save project category
    public function store(Request $request)
    {
        //Rule for validation
        $rules=[
        'name' => 'required',
      ];
      $validator = Validator::make($request->all(),$rules);
      //Make validation with rule
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }
       // If no error than go inside otherwise go to the catch section
      try
      {
        $blog_category = New BlogCategory;
        $blog_category->parent_id = $request->get('parent_id');
        $blog_category->name = $request->get('name');
        $blog_category->save();
        return redirect()->route('blog_categories.index')->withSuccess("Insert record successfully.");
        }
      catch(\Exception $e)
      {
        return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
      }
    }
    //Show project category
    public function show($id)
    {
        $blog_category = BlogCategory::find($id);
        return view('blog_categories.show', compact('blog_category'));
    }
    //Edit project category
    public function edit($id)
    {
        $blog_categories = BlogCategory::whereNull('parent_id')->orderBy('name')->pluck('name','id');
        $blog_category = BlogCategory::find($id);
        Former::populate($blog_category);
    return view('blog_categories.edit', compact('blog_category','blog_categories','  user'));
    }
    //Update project category
    public function update(Request $request, $id)
    {   //Rule for validation
        $rules=[
        'name' => 'required',
      ];
      //Make validtion with rules
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }
       // If no error than go inside otherwise go to the catch section
      try
      {
        $blog_category = BlogCategory::find($id);
        $blog_category->parent_id = $request->get('parent_id');
        $blog_category->name = $request->get('name');
        $blog_category->save();
        return redirect()->route('blog_categories.index')->withSuccess("Insert record successfully.");
      }
       catch(\Exception $e)
      {
        return redirect()->route('blog_categories.index')->withError('Something went wrong, Please try after sometime.');
      }
    }
    //Delete project category
    public function destroy($id)
    {
        $blog_category = BlogCategory::find($id);
        $blog_category->delete();
      return redirect()->route('blog_categories.index')->withSuccess('Deleted successfully.');
    }
}