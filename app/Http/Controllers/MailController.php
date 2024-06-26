<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendEmailRequest;
use Mail;
use App\Mail\SendMail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function index(SendEmailRequest $request)
    {
        
        Mail::to($request->input('email'))->send(new SendMail([
            'from' => $request->input('email_user'),
            'title' => $request->input('title'),
            'body' => $request->input('body')
        ]));

        return redirect()->back();
    }
}