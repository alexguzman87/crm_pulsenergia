<?php

namespace App\Http\Controllers;
use Mail;
use App\Mail\SendMail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(Request $request)
    {
        
        Mail::to($request->input('email'))->send(new SendMail([
            'from' => $request->input('email_user'),
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]));

        return redirect()->back();
    }
}