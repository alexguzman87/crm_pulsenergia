<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\Oportunity;
use App\Models\Task;

use Illuminate\Http\Request;

class basicController extends Controller
{
    public function home (){
        

        if(auth()->user()->type_user=='admin'){
        
            $task_process=Task::where('status','en_proceso')->count();
            $task_toDo=Task::where('status','pendiente')->count();
            $lead = Contact::all()->count();
            $lead_very_likely = Contact::where('id_level','5')->count();
            $budget = Oportunity::sum('budget');
            $sales = Oportunity::where('status','sale')->sum('budget');
            //$lastContactDays7 = Contact::where('created_at', '>=', now()->subDays(7))->count();
            //$lastTaskDays7 = Task::where('created_at', '>=', now()->subDays(7))->count();

            return view ('index', compact('task_process', 'task_toDo', 'lead', 'lead_very_likely','budget','sales'));
            
        }else{
            $task_process=Task::where('id_user',auth()->user()->id)->where('status','en_proceso')->count();
            $task_toDo=Task::where('id_user',auth()->user()->id)->where('status','pendiente')->count();
            $lead = Contact::where('id_user',auth()->user()->id)->count();
            $lead_very_likely = Contact::where('id_user',auth()->user()->id)->where('id_level','5')->count();
            $budget = Oportunity::where('id_user',auth()->user()->id)->sum('budget');
            $sales = Oportunity::where('id_user',auth()->user()->id)->where('status','sale')->sum('budget');
            //$lastContactDays7 = Contact::where('created_at', '>=', now()->subDays(7))->count();
            //$lastTaskDays7 = Task::where('created_at', '>=', now()->subDays(7))->count();

            return view ('index', compact('task_process', 'task_toDo', 'lead', 'lead_very_likely','budget','sales'));
        }    
    }
    
    public function index(Request $request){
        if(view()->exists($request->path())){
            return view($request->path());
        }
    }
}
