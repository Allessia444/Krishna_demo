<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Project;
use Validator;
use Former;
use App\User;
class ProjectsController extends Controller
{
    //List all project
    public function index()
    {
        $projects = Project::orderBy('id','name')->get();
        return view('projects.index',compact('projects','user_id'));
    }
    //Create project
     public function create()
    {
        $users = User::orderBy('name','id')->pluck('name','id');
        return view('projects.add',compact('users','user_id'));
    }
    //Save project
    public function store(Request $request)
    {   //Rule for validation
        $rules=[
            'name' => 'required',
            'confirm_hr' => 'required'
        ];
       //Make validation with rule
        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) { 
            Former::withErrors($validator);
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
      try
      {
        $project = New Project;
        $project->name = $request->get('name');
        $project->user_id = $request->get('user_id');
        $project->confirm_hr = $request->get('confirm_hr');
        $project->save();
        return redirect()->route('projects.index')->withSuccess("Insert record successfully.");
         }
      catch(\Exception $e)
      {
        return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
      }
    }
    public function show($id)
    {
        $project = Project::find($id);
        return view('projects.show', compact('project'));
    }
    public function edit($id)
    {
        $user = User::orderBy('name','id')->pluck('name','id');
        $project = Project::find($id);
        Former::populate($project);
        return view('projects.edit', compact('project','user'));
    }
    public function update(Request $request, $id)
    {
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
            $project = Project::find($id);
            $project->name = $request->get('name');
            $project->user_id = $request->get('user_id');
            $project->confirm_hr = $request->get('confirm_hr');
            $project->save();
            return redirect()->route('projects.index')->withSuccess("Insert record successfully.");
              }
          catch(\Exception $e)
          {
            return redirect()->route('projects.index')->withError('Something went wrong, Please try after sometime.');
          }
    }
    //Delete project
    public function destroy($id)
    {
        $project = Project::find($id);
        $project->delete();
        return redirect()->route('projects.index')->withSuccess('Deleted successfully.');
    }
}