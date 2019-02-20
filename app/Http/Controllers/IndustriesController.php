<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Industry;
use Validator;
use Former;
use App\User;

class IndustriesController extends Controller
{

  //List all Industries
  public function index()
  {
    $industries = Industry::orderBy('id','name')->get();
    return view('industries.index',compact('industries'));
  }

  //Create industry
  public function create()
  {
    return view('industries.add',compact('users'));
  }

  //Save Industry
  public function store(Request $request)
  {
    //Rule for validation 
    $rules=[
      'name' => 'required',
    ];
    //Make  validation with rule
    $validator = Validator::make($request->all(),$rules);
    // If validator fails than it will redirect back and gives error otherwise go to try catch section
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
    // If no error than go inside otherwise go to the catch section
      try
        {
          $industry = New Industry;
          $industry->name = $request->get('name');
          $industry->save();
          return redirect()->route('industries.index')->withSuccess("Insert record successfully.");
          }
        catch(\Exception $e)
        {
        return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
      }
  }

  //Show industry
  public function show($id)
  {
    $industry = Industry::find($id);
    return view('industries.show', compact('industry'));
  }

  //Edit industry
  public function edit($id)
  {
    $industry = Industry::find($id);
    Former::populate($industry);

    return view('industries.edit', compact('industry','user'));
  }

  //Update industry
  public function update(Request $request, $id)
  {
    //Rule for validation 
    $rules=[
      'name' => 'required',
    ];
    //Make rule with validation
    $validator = Validator::make($request->all(),$rules);
    if ($validator->fails()) { 
      Former::withErrors($validator);
      return redirect()->back()->withErrors($validator)->withInput();
    }
     // If no error than go inside otherwise go to the catch section
      try
        {
        $industry = Industry::find($id);
        $industry->name = $request->get('name');
        $industry->save();
        return redirect()->route('industries.index')->withSuccess("Insert record successfully.");
       }
        catch(\Exception $e)
        {
        return redirect()->route('clients.index')->withError('Something went wrong, Please try after sometime.');
      }
  }

  //Delete Industry
  public function destroy($id)
  {
    $industry = Industry::find($id);
    $industry->delete();
    return redirect()->route('industries.index')->withSuccess('Deleted successfully.');
  }
}
