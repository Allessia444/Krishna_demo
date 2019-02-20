<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ProjectCategory;
use Validator;
use Former;
class ProjectCategoriesController extends Controller
{
    //List project categories
    public function index()
    {   
        $project_categories = ProjectCategory::whereNotNull('parent_id')->orderBy('name')->get();
        return view('project_categories.index',compact('project_categories'));
    }
    //Create project project_category
    public function create()
    {
        $project_categories = ProjectCategory::whereNull('parent_id')->orderBy('name')->pluck('name','id');
        return view('project_categories.add', compact('project_categories'));
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
        $project_category = New ProjectCategory;
        $project_category->parent_id = $request->get('parent_id');
        $project_category->name = $request->get('name');
        $project_category->lft = $request->get('lft');
        $project_category->rgt = $request->get('rgt');
        $project_category->depth = $request->get('depth');
        $project_category->save();
        return redirect()->route('project_categories.index')->withSuccess("Insert record successfully.");
        }
      catch(\Exception $e)
      {
        return redirect()->route('project_categories.index')->withError('Something went wrong, Please try after sometime.');
      }
    }
    //Show project category
    public function show($id)
    {
        $project_category = ProjectCategory::find($id);
        return view('project_categories.show', compact('project_category'));
    }
    //Edit project category
    public function edit($id)
    {
        $project_categories = ProjectCategory::whereNull('parent_id')->orderBy('name')->pluck('name','id');
        $project_category = ProjectCategory::find($id);
        Former::populate($project_category);
    return view('project_categories.edit', compact('project_category','project_categories','  user'));
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
        $project_category = ProjectCategory::find($id);
        $project_category->name = $request->get('name');
        $project_category->lft = $request->get('lft');
        $project_category->rgt = $request->get('rgt');
        $project_category->depth = $request->get('depth');
        $project_category->save();
        return redirect()->route('project_categories.index')->withSuccess("Insert record successfully.");
      }
       catch(\Exception $e)
      {
        return redirect()->route('project_categories.index')->withError('Something went wrong, Please try after sometime.');
      }
    }
    //Delete project category
    public function destroy($id)
    {
        $project_category = ProjectCategory::find($id);
        $project_category->delete();
      return redirect()->route('project_categories.index')->withSuccess('Deleted successfully.');
    }
}