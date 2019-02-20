<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\TaskCategory;
use Validator;
use Former;
use App\User;
class TaskCategoriesController extends Controller
{
  //List task categories
  public function index()
  {
    $task_categories = TaskCategory::orderBy('id','name')->get();
    return view('task_categories.index',compact('task_categories'));
  }
  //Create task categories
  public function create()
  {
    return view('task_categories.add',compact('users'));
  }
  //Save task category
  public function store(Request $request)
  {
     //Rules for validation
    $rules=[
      'name' => 'required',
    ];
    // Make validator with rules
    $validator = Validator::make($request->all(),$rules);
    // If validator fails than it will redirect back and gives error otherwise go to try catch section
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
     // If no error than go inside otherwise go to the catch section
      try
      {
        $task_category = New TaskCategory;
        $task_category->name = $request->get('name');
        $task_category->save();
        return redirect()->route('task_categories.index')->withSuccess("Insert record successfully.");
    }
      catch(\Exception $e)
      {
        return redirect()->route('task_categories.index')->withError('Something went wrong, Please try after sometime.');
      }
  }
  //Show task category
  public function show($id)
  {
    $task_category = TaskCategory::find($id);
    return view('task_categories.show', compact('task_category'));
  }
  //Edit task category
  public function edit($id)
  {
    $user = User::orderBy('name','id')->pluck('name','id');
    $task_category = TaskCategory::find($id);
    Former::populate($task_category);
    return view('task_categories.edit', compact('task_category','user'));
  }
  //Update task category
  public function update(Request $request, $id)
  {
    //Rules for validation
    $rules=[
      'name' => 'required',
    ];
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
     // If no error than go inside otherwise go to the catch section
      try
      {
        $task_category = TaskCategory::find($id);
        $task_category->name = $request->get('name');
        $task_category->save();
        return redirect()->route('task_categories.index')->withSuccess("Insert record successfully.");
     }
      catch(\Exception $e)
      {
        return redirect()->route('task_categories.index')->withError('Something went wrong, Please try after sometime.');
      }
  }
  //Delete task category
  public function destroy($id)
  {
    $task_category = TaskCategory::find($id);
    $task_category->delete();
    return redirect()->route('task_categories.index')->withSuccess('Deleted successfully.');
  }
}