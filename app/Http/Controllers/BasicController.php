<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\Task;

use Illuminate\Http\Request;

class basicController extends Controller
{
    public function home (){
        $contact = Contact::all()->count();
        $lead = Lead::all()->count();
        $lastContactDays7 = Contact::where('created_at', '>=', now()->subDays(7))->count();
        $lastTaskDays7 = Task::where('created_at', '>=', now()->subDays(7))->count();

        return view ('index', compact('contact','lead','lastContactDays7','lastTaskDays7'));
    }
    
    public function index(Request $request){
        if(view()->exists($request->path())){
            return view($request->path());
        }
    }
}
