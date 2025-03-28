<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session; 

class AuthManager extends Controller
{
    function login(){
        return view('login');
    }

    function registration(){
        return view('registration');
    }

function loginPost(Request $request){
    $request->validate([
        'email' => 'required',
        'password' =>  'required'
    ]);

    $credentials = $request ->only('email','password');
    if(Auth::attempt($credentials)){
        // Authentication successful, retrieve the user
        $user = Auth::user(); // Get the authenticated user object
        if ($user) {

            return redirect()->intended(route('home'));
        } else {
            //Shouldn't happen, but handle the case where Auth::user() is null
            return redirect(route('login'))->with('error', 'Authentication successful, but user retrieval failed.');
        }

    }
    return redirect(route('login'))->with('error', 'login details are not valid');
}


    function registrationPost(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' =>  'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user = User::create($data);
        if(!$user){
            return redirect(route('registration')) ->with('error','registration failed, try again');
        }
        return redirect(route('login'))->with('success', 'registration success, login to access the app');

    }

    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
}
