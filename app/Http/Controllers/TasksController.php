<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
use App\TaskCategory;
use Image;
use Former;
class TasksController extends Controller
{
    // List all user experience of perticular user
    public function index()
    {
        $tasks = Task::where('user_id', '=', Auth::user()->id)->orderBy('name','id')->get();
        return view('tasks.index',compact('users','tasks','user_id'));
    }

    // Create user experience
    public function create()
    {   
        $tasks = TaskCategory::all()->pluck('name','id');
        return view('tasks.add', compact('tasks','user_id'));
    }

    // Save user experience
    public function store(Request $request)
    {

         // Rules for validation
        $rules=[
            'name' => 'required',
            'notes' => 'required',
            'priority' => 'required',
            'start_date' => 'required',
            'end_date' => 'required|after:start_date',
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
            $task = New Task;
            $task->user_id = Auth::user()->id;
            $task->task_category_id = $request->get('task_category_id');
            $task->name = $request->get('name');
            $task->notes = $request->get('notes');
            $task->priority = $request->get('priority');
            $task->start_date = date("Y-m-d", strtotime($request->get('start_date')));
            $task->end_date = date("Y-m-d", strtotime($request->get('end_date')));
            $task->save();
             return redirect()->route('tasks.index')->withSuccess("User Exception has been inserted successfully.");     
        }
        catch(\Exception $e)
        {
              return redirect()->route('tasks.index')->withError('Something went wrong, Please try after sometime.');
        }
    }

    // Show user experience
    public function show($id)
    {
        $task = Task::find($id);
        return view('tasks.show',compact('task'));
    }

    // Edit user experience
    public function edit($id)
    {
         $task_category = TaskCategory::all()->pluck('name','id');
         $task = Task::find($id);
          Former::populate($task);
        return view('tasks.edit', compact('task','task_category'));
    }

    // Update user experience
    public function update(Request $request, $id )
    {
        // Rules for validation
        $rules=[
            
        ];
        // Make validator with rules 
        $validator = Validator::make($request->all(),$rules);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        // If no error than go inside otherwise go to the catch section
        // try
        // {
            $task = Task::find($id);
            $task->task_category_id = $request->get('task_category_id');
            $task->name = $request->get('name');
            $task->notes = $request->get('notes');
            $task->priority = $request->get('priority');
            $task->start_date = date("Y-m-d", strtotime($request->get('start_date')));
            $task->end_date = date("Y-m-d", strtotime($request->get('end_date')));
            $task->save();
             return redirect()->route('tasks.index')->withSuccess("User Exception has been inserted successfully.");     
        // }
        // catch(\Exception $e)
        // {
        //     return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        // }
    }

     // Delete  user experience
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();
      return redirect()->route('tasks.index')->withSuccess('Deleted successfully.');
    }
}
