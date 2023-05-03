<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class basicController extends Controller
{
    public function home (){
        return view('index');
    }
    
    public function index(Request $request){
        if(view()->exists($request->path())){
            return view($request->path());
        }
    }
}
