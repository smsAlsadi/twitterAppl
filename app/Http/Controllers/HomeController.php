<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['hello']);
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
    public function hello()
    {
        $word="A";
        $secondWord="Oman";
        // return "Hello";
        // if(Auth::check()){

        //     echo Auth::user()->email;
        // }else {
        //     echo Auth::user()->email;
        // }
        // $user =User::where('id',2)->first();
        // if($user){
        //     return $user->name;
        // }
        // else {
        //     return "User Not Found";
        // }


        $user =User::where('id',1)->first();
        if($user){
            return $user->name." ".$user->email;
        }
        else {
            return "User Not Found";
        }
    }
}
