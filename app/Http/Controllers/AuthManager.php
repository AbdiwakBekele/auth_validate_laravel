<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller{
    

    function login(){

        if(Auth::check()){
            return redirect('/home');
        }
        return view('login');

    }

    function loginPost(Request $request){

        $request->validate([
            'email'=>'required',
            'password'=>'required'
        ]);

        $credential = $request->only('email', 'password');
        if(Auth::attempt($credential)){
            return redirect()->intended('/home');
        }else{
            return redirect('/login')->with('error', 'Login details are not valid');
        }
    }

    function register(){
        return view('register');
    }

    function registrationPost(Request $request){
        $request->validate([
            'fullname'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required'
        ]);

        $data['name'] = $request->fullname;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        $user = User::create($data);

        if(!$user){
            return redirect('/register')->with('error', 'Failed to register');
        }
        return redirect('/register')->with('success', 'Registration Successful, login to access the app');
    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect('/login');
    }
}