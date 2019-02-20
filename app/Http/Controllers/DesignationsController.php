<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Designation;
use Validator;
use Former;

class DesignationsController extends Controller
{
    //List all designations 
  public function index()
  {
    $designations = Designation::orderBy('id','name')->get();
    return view('designations.index',compact('designations'));
  }

    //Create designation
  public function create()
  {
    return view('designations.add',compact('users'));
  }

    //Save designation
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
      $designation = New Designation;
      $designation->name = $request->get('name');
      $designation->save();
      return redirect()->route('designations.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

    // Show designation
  public function show($id)
  {
    $designation = Designation::find($id);
    return view('designations.show', compact('designation'));
  }

    //Edit designation
  public function edit($id)
  {
    $designation = Designation::find($id);
    Former::populate($designation);

    return view('designations.edit', compact('designation','user'));
  }

    //Update designation
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
      $designation = Designation::find($id);
      $designation->name = $request->get('name');
      $designation->save();
      return redirect()->route('designations.index')->withSuccess("Insert record successfully.");
    }
    catch(\Exception $e)
    {
      return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
    }
  }

    //Delete designation
  public function destroy($id)
  {
    $designation = Designation::find($id);
    $designation->delete();
    return redirect()->route('designations.index')->withSuccess('Deleted successfully.');
  }
}
