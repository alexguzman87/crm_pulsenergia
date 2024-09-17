<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\LoginRequest;
use App\Models\LoginRegister;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function show (){
            if(Auth::check()){
                return redirect('/home');
            }
            return view ('auth/login');
    }
    
    public function login(LoginRequest $request){
        $credentials = $request->getCredentials();
        
        $remember =  $request->filled('remember');

            if (Auth::attempt($credentials, $remember)){
                $request->session()->regenerate();
                
                $loginRegister = new LoginRegister();
                $loginRegister->id_user = auth()->user()->id;
                $loginRegister->save();
                
                return redirect('/');
            }
        return redirect()->back()->withErrors('Nombre de Usuario y/o contraseña incorrecta');
    }

    public function logout(){
        Session::flush(); 

        Auth::logout();

        return view('auth/logout'); 
    }

    public function create (){
        return view('index');
    }
}
