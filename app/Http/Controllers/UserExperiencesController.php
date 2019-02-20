<?php

namespace App\Http\Controllers;

use App\UserExperience;
use Illuminate\Http\Request;
use App\User;
use Validator;
class UserExperiencesController extends Controller
{
    // List all user experience of perticular user
    public function index($user_id)
    {
        $users = User::find($user_id);
        $experiences = UserExperience::where('user_id', '=', $user_id)->orderBy('id')->get();
        return view('experiences.index',compact('users','experiences','user_id'));
    }

    // Create user experience
    public function create($user_id)
    {
        $users = User::orderBy('name','id')->pluck('name','id');
        return view('experiences.add', compact('users','user_id'));
    }

    // Save user experience
    public function store(Request $request ,$user_id)
    {

         // Rules for validation
        $rules=[
            'company' => 'required',
            'from' => 'required',
            'to' => 'required',
            'salary' => 'required',
            'reason' => 'required'
        ];
        // Make validator with rules 
        $validator = Validator::make($request->all(),$rules);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) { 
            return response()->json($validator->getMessageBag()->toArray(), 422);
        }
        // If no error than go inside otherwise go to the catch section
        try
        {
            foreach ($request->get('company') as $key => $value) {
                $exprience = New UserExperience;
                $exprience->user_id = $user_id;
                $exprience->company = $request->get('company')[$key];
                $exprience->from = date('Y-m-d', strtotime($request->get('from')[$key]));
                $exprience->to = date('Y-m-d', strtotime($request->get('to')[$key]));
                $exprience->salary = $request->get('salary')[$key];
                $exprience->reason = $request->get('reason')[$key];
                $exprience->save();
            }
             return redirect()->route('users.experiences.index',$user_id,compact('user_id'))->withSuccess("User Exception has been inserted successfully.");     
        }
        catch(\Exception $e)
        {
            return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        }
    }

    // Show user experience
    public function show($user_id, $experience_id)
    {
        $exprience = UserExperience::find($experience_id);
        return view('experiences.show',compact('exprience','user_id','experience_id'));
    }

    // Edit user experience
    public function edit(UserExperience $userExperience)
    {
        
    }

    // Update user experience
    public function update(Request $request, UserExperience $userExperience)
    {
        //
    }

     // Delete  user experience
    public function destroy($user_id, $experience_id)
    {
        $exprience = UserExperience::where('user_id', '=', $user_id)->where('id', '=', $experience_id);
        $exprience->delete();
      return redirect()->route('experiences.index')->withSuccess('Deleted successfully.');
    }
}
