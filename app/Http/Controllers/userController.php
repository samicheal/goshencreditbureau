<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Validator;
use Response;
use Session;
use View;

class userController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin1');
        $this->middleware('admin2');
    }

    public function index(){
        $user = User::all();
        return view('admin.viewuser')->with('user', $user);
    }

    public function create(){
        return view('admin.adduser');
    }

    public function store(){
        $this->validate(request(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string|min:6'
        ]);

        $user = new User;

        $user->name = request()->name;
        $user->email = request()->email;
        $user->password = bcrypt(request()->password);
        $user->admin = 1;

        $user->save();

        Session::flash('success','User Added successfully');

        return redirect()->route('manageuser');
    }

}
