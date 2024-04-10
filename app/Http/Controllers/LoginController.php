<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin(){
        return view('users.login');
    }
    public function login(Request $request){
        $input=$request->only('email', 'password');
        if(Auth::attempt($input)){
            if(Auth::user()->role=='admin'){
                return redirect('admin');
            }
            return redirect()->route('home.route');
        }
        session()->flash('error',1);
        return redirect()->route('login.route');
    }
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login.route');
    }
}
