<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('admin.layouts.dashboard');
    }
    public function userlist()
    {
        $users= User::all();
        return view('admin.user',['users'=>$users]);
    }
    public function delete($id){
        $delete= User::find($id);
        $delete->delete();
        $message="User Successfully Deleted";
        return redirect('/userlist')->with('success',$message);
       }
}
