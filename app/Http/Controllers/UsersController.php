<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Former;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id','name')->get();
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.add');
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
        'middle_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'dob' => 'required',
        'address' => 'required',
        'hobby' => 'required',
        'age'=> 'required',
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = New User;
      $user->name = $request->get('name');
      $user->middle_name=$request->get('middle_name');
      $user->last_name=$request->get('last_name');
      $user->gender=$request->get('gender');
      $user->city=$request->get('city');
      $user->state=$request->get('state');
      $user->country=$request->get('country');
      $user->dob=$request->get('dob');
      $user->address=$request->get('address');
      $user->hobby = implode(',',$request->get('hobby'));
      $user->age = $request->get('age');
      $user->save();
      return redirect()->route('users.index')->withSuccess("Insert record successfully.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        Former::populate($user);

    return view('users.edit', compact('user'));
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
        'middle_name' => 'required',
        'last_name' => 'required',
        'gender' => 'required',
        'city' => 'required',
        'state' => 'required',
        'country' => 'required',
        'dob' => 'required',
        'address' => 'required',
        'hobby' => 'required',
        'age'=> 'required',
      ];
      $validator = Validator::make($request->all(),$rules);
      if ($validator->fails()) { 
        Former::withErrors($validator);
        return redirect()->back()->withErrors($validator)->withInput();
      }

      $user = User::find($id);
      $user->name = $request->get('name');
      $user->middle_name=$request->get('middle_name');
      $user->last_name=$request->get('last_name');
      $user->gender=$request->get('gender');
      $user->city=$request->get('city');
      $user->state=$request->get('state');
      $user->country=$request->get('country');
      $user->dob=$request->get('dob');
      $user->address=$request->get('address');
      $user->hobby = implode(',',$request->get('hobby'));
      $user->age = $request->get('age');
      $user->save();
      return redirect()->route('users.index')->withSuccess("Insert record successfully.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
      return redirect()->route('users.index')->withSuccess('Deleted successfully.');
    }
}
