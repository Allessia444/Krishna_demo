<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function home()
    {
        $users = User::count();

        $users = User::select(DB::raw("COUNT(*) as count ,  extract(month from created_at) as month"))
        ->groupBy(DB::raw("extract(month from created_at)"))
        ->pluck('count','month');
        for($i=1; $i<=12;$i++)
        {
            $users_data[] =  isset($users[$i]) ? $users[$i] : 0;
        }
        $data[] = array(
            'data' => $users_data
        );
        $data = json_encode($data);
        return view('index',compact('users','data'));
    }



    
   
}
