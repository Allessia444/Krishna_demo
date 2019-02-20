<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Former;
use DateTime;
use Carbon\Carbon;
use App\UserProfile;
use App\Department;
use App\Designation;
use App\Blog;
use Auth;
use Hash;

class UsersController extends Controller
{
    //List users
    public function index()
    {
        $users = User::orderBy('id','name')->get();
        return view('users.index',compact('users'));
    }
    //Create user
    public function create()
    {
      $departments = Department::orderBy('name','id')->pluck('name','id');
      $designation = Designation::orderBy('name','id')->pluck('name','id');
        return view('users.add',compact('departments','designation'));
    }

   //Save user
    public function store(Request $request)
    {   //Rule for validation
        $rules=[
        // 'name' => 'required',
        // 'middle_name' => 'required',
        // 'last_name' => 'required',
        // 'gender' => 'required',
        // 'city' => 'required',
        // 'state' => 'required',
        // 'country' => 'required',
        // 'dob' => 'required',
        // 'address' => 'required',
        // 'hobby' => 'required',
      ];
      //Make validation with rule
      $validator = Validator::make($request->all(),$rules);
      // If validator fails than it will redirect back and gives error otherwise go to try catch section
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }
      // If no error than go inside otherwise go to the catch section
        // try
        // {
          $password = "krishna";
          $user = New User;
          $user->department_id = $request->get('department_id');
          $user->designation_id = $request->get('designation_id');
          $user->name = $request->get('name');
          $user->role = "user";
          $user->email=$request->get('email');
          $user->password=Hash::make($password);;
          $user->middle_name=$request->get('middle_name');
          $user->last_name=$request->get('last_name');  
          $user->active=$request->get('active');         
          //$user_profile->team_lied =$request->get('team_lied');
          $user->save();
          $user_profile = new UserProfile;
          $user_profile->user_id = $user->id;
          $user_profile->mobile=$request->get('mobile');
          $user_profile->phone=$request->get('phone');
          $user_profile->address_1=$request->get('address_1');
          $user_profile->address_2=$request->get('address_2');
          $user_profile->zipcode=$request->get('zipcode');
          $user_profile->pan_number=$request->get('pan_number');
          $user_profile->management_level=$request->get('management_level');
          $user_profile->join_date=date("Y-m-d", strtotime($request->get('join_date')));
          $user_profile->photo=$request->get('photo');
          $user_profile->attach=$request->get('attach');
          $user_profile->google=$request->get('google');
          $user_profile->facebook=$request->get('facebook');
          $user_profile->website=$request->get('website');
          $user_profile->skype=$request->get('skype');
          $user_profile->linkedin=$request->get('linkedin');
          $user_profile->twitter=$request->get('twitter');
          $user_profile->gender=$request->get('gender');
          $user_profile->dob = $request->get('dob');
          $user_profile->city=$request->get('city');
          $user_profile->state=$request->get('state');
          $user_profile->country=$request->get('country');
          $user_profile->hobby =$request->get('hobby');
          $user_profile->save();
          return redirect()->route('users.index')->withSuccess("Insert record successfully.");
        //    }
        // catch(\Exception $e)
        // {
        //     return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
        // }
    }

    //Show user
    public function show($id)
    {
       $blogs = Blog::where('user_id', '=', $id)->orderBy('name','id')->get();
        $user = User::find($id);
        return view('users.show', compact('user','blogs'));
    }

    //Edit user
    public function edit($id)
    {
        $departments = Department::orderBy('name','id')->pluck('name','id');
        $designation = Designation::orderBy('name','id')->pluck('name','id');
        $user = User::find($id);
        $user_profile =UserProfile::where('user_id', '=',$id);
        Former::populate($user,$user_profile);

    return view('users.edit', compact('user','user_profile','departments','designation'));
    }
    //Update user
    public function update(Request $request, $id)
    {   //Rule for validation
        $rules=[
        // 'name' => 'required',
        // 'middle_name' => 'required',
        // 'last_name' => 'required',
        // 'gender' => 'required',
        // 'city' => 'required',
        // 'state' => 'required',
        // 'country' => 'required',
        // 'dob' => 'required',
        // 'address' => 'required',
        // 'hobby' => 'required',
      ];
      //Make validation with rule
      $validator = Validator::make($request->all(),$rules);
      // If validator fails than it will redirect back and gives error otherwise go to try catch section
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }
      // If no error than go inside otherwise go to the catch section
        // try
        // {
          $user = User::find($id);
          $user->update($request->all());
          $user_profile =UserProfile::where('user_id', '=',$id)->get();
          $user_profile = $user->user_profile;
          $user_profile->update($request->all());
          return redirect()->route('users.index')->withSuccess("Insert record successfully.");
       // }
       //  catch(\Exception $e)
       //  {
       //      return response()->json(["error" => "Something went wrong, Please try after sometime."], 422);
       //  }
    }
    //Delete user
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
      return redirect()->route('users.index')->withSuccess('Deleted successfully.');
    }
    //Logout auth user
    public function logout()
    {
        Auth::logout(); 
        return redirect('/login');
    }

    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    // Update profile
    public function update_profile(Request $request)
    {
        //Rules for validation
        $rules=[
        // 'name' => 'required',
        // 'middle_name' => 'required',
        // 'last_name' => 'required',
        // 'gender' => 'required',
        // 'city' => 'required',
        // 'state' => 'required',
        // 'country' => 'required',
        // 'dob' => 'required',
        // 'address' => 'required',
        // 'hobby' => 'required',
        ];
        // Make validator with rules and messages
        $validator = Validator::make($request->all(),$rules);
        // If validator fails than it will redirect back and gives error otherwise go to try catch section
        if ($validator->fails()) {
          Former::withErrors($validator);
          return redirect()->back()->withErrors($validator)->withInput();
        }
        // If no error than go inside otherwise go to the catch section
        try
        {
          $user = User::find(Auth::user()->id);
          $user->department_id = $request->get('department_id');
          $user->designation_id = $request->get('designation_id');
          $user->name = $request->get('name');
          $user->middle_name=$request->get('middle_name');
          $user->last_name=$request->get('last_name');  
          $user->active=$request->get('active');         

          $user->save();
           $user_profile->user_id = $user->id;
          $user_profile->mobile=$request->get('mobile');
          $user_profile->phone=$request->get('phone');
          $user_profile->address_1=$request->get('address_1');
          $user_profile->address_2=$request->get('address_2');
          $user_profile->zipcode=$request->get('zipcode');
          $user_profile->pan_number=$request->get('pan_number');
          $user_profile->management_level=$request->get('management_level');
          $user_profile->join_date=date("Y-m-d", strtotime($request->get('join_date')));
          $user_profile->photo=$request->get('photo');
          $user_profile->google=$request->get('google');
          $user_profile->facebook=$request->get('facebook');
          $user_profile->website=$request->get('website');
          $user_profile->skype=$request->get('skype');
          $user_profile->linkedin=$request->get('linkedin');
          $user_profile->twitter=$request->get('twitter');
          //$user_profile->gender=$request->get('gender');
          $user_profile->dob = $request->get('dob');
          $user_profile->city=$request->get('city');
          $user_profile->state=$request->get('state');
          $user_profile->country=$request->get('country');
          $user_profile->hobby =$request->get('hobby');
          $user_profile->save();
            return redirect()->back()->withSuccess('Profile updated successfully.');
        }
        catch(\Exception $e)
        {
            return redirect()->route('profile')->withError('Something went wrong, Please try after sometime.');
        } 

    }   
        public function photo_upload()
        {
          $user = User::find(Auth::user()->id);
          $user_profile = $user->user_profile;
          return response()->json(['photo_name'=>$user_profile->photo], 200);
        }
}


 