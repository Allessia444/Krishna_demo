<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Validator;
use Former;
use App\User;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::orderBy('id','name')->get();
        return view('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::orderBy('id','name')->pluck('name','id');
        return view('projects.add',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules=[
        'name' => 'required',
        'confirm_hr' => 'required',
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $project = New Project;
      $project->name = $request->get('name');
      $project->user_id=$request->get('user_id');
      $project->confirm_hr=$request->get('confirm_hr');
      $project->save();
      return redirect()->route('projects.index')->withSuccess("Insert record successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id)->pluck('name','id');
        $project = Project::find($id);
        Former::populate($project);

    return view('projects.edit', compact('project','user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules=[
        'name' => 'required',
        'confirm_hr' => 'required',
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $project = Project::find($id);
      $project->name = $request->get('name');
      $project->user_id=$request->get('user_id');
      $project->confirm_hr=$request->get('confirm_hr');
      $project->save();
      return redirect()->route('projects.index')->withSuccess("Insert record successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
      return redirect()->route('projects.index')->withSuccess('Deleted successfully.');
    }
}
