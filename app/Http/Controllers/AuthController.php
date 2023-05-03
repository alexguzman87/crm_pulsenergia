<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function show (){
            if(Auth::check()){
                return redirect('/home');
            }
            return view ('auth-signin-cover');
    }
    
    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
        
        $remember =  $request->filled('remember');

            if (Auth::attempt($credentials, $remember)){
                $request->session()->regenerate();
                return redirect('/');
            }
            return redirect()->back()->withErrors('Nombre de Usuario y/o contraseña incorrecta');
    }

    public function logout(){
        Session::flush(); 

        Auth::logout();

        return view('auth-signout-cover'); 
    }
}
