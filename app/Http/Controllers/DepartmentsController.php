<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Department;
use Validator;
use Former;

class DepartmentsController extends Controller
{
    //List all departments 
  public function index()
  {
    $departments = Department::orderBy('id','name')->get();
    return view('departments.index',compact('departments'));
  }

    //Create department
  public function create()
  {
    return view('departments.add',compact('users'));
  }

    //Save department
  public function store(Request $request)
  {
    //Rule for validation 
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
      $department = New Department;
      $department->name = $request->get('name');
      $department->save();
      return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

    // Show department
  public function show($id)
  {
    $department = Department::find($id);
    return view('departments.show', compact('department'));
  }

    //Edit department
  public function edit($id)
  {
    $department = Department::find($id);
    Former::populate($department);

    return view('departments.edit', compact('department','user'));
  }

    //Update department
  public function update(Request $request, $id)
  {
    //Rull for validation
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
      $department = Department::find($id);
      $department->name = $request->get('name');
      $department->save();
      return redirect()->route('departments.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

    //Delete department
  public function destroy($id)
  {
    $department = Department::find($id);
    $department->delete();
    return redirect()->route('departments.index')->withSuccess('Deleted successfully.');
  }
}
