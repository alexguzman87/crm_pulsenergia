<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use App\Charts\OportunityChart;
use App\Charts\RegionLeadChart;
use App\Charts\TaskPieChart;
use App\Models\Contact;
use App\Models\Lead;
use App\Models\Oportunity;
use App\Models\Task;


use Illuminate\Http\Request;

class BasicController extends Controller
{
    public function home (TaskPieChart $chart, OportunityChart $chartBar, RegionLeadChart $chartRegion ){
        

        if(auth()->user()->type_user=='admin'){
        
            $task=Task::where('status','pendiente')->orWhere('status','en_proceso')->where('done_date', '>=', now()->subDays(7))->get();
            $task_process=Task::where('status','en_proceso')->count();
            $task_toDo=Task::where('status','pendiente')->count();
            $task_do = Task::where('status','hecho')->count();
            $lead = Contact::all()->count();
            $lead_very_likely = Contact::where('id_level','5')->count();
            $budget = Oportunity::sum('budget');
            $sales = Oportunity::where('status','sale')->sum('budget');
            //$lastContactDays7 = Contact::where('created_at', '>=', now()->subDays(7))->count();
            //$lastTaskDays7 = Task::where('created_at', '>=', now()->subDays(7))->count();

            return view ('index', compact('task_process', 'task_toDo', 'task_do', 'lead', 'lead_very_likely','budget','sales', 'task'), ['chart' => $chart->build(),'chartBar' => $chartBar->build(), 'chartRegion' => $chartRegion->build()],);
            
        }else{
            $task=Task::where('id_user',auth()->user()->id)->where('done_date', '>=', now()->subDays(7))->get();
            $task_process=Task::where('id_user',auth()->user()->id)->where('status','en_proceso')->count();
            $task_toDo=Task::where('id_user',auth()->user()->id)->where('status','pendiente')->count();
            $task_do = Task::where('id_user',auth()->user()->id)->where('status','hecho')->count();
            $lead = Contact::where('id_user',auth()->user()->id)->count();
            $lead_very_likely = Contact::where('id_user',auth()->user()->id)->where('id_level','5')->count();
            $budget = Oportunity::where('id_user',auth()->user()->id)->sum('budget');
            $sales = Oportunity::where('id_user',auth()->user()->id)->where('status','sale')->sum('budget');
            //$lastContactDays7 = Contact::where('created_at', '>=', now()->subDays(7))->count();
            //$lastTaskDays7 = Task::where('created_at', '>=', now()->subDays(7))->count();

            return view ('index', compact('task_process', 'task_toDo', 'task_do', 'lead', 'lead_very_likely','budget','sales', 'task'), ['chart' => $chart->build_id(auth()->user()->id),'chartBar' => $chartBar->build_id(auth()->user()->id), 'chartRegion' => $chartRegion->build_id(auth()->user()->id)]);
        }    
    }
    
    public function index(Request $request){
        if(view()->exists($request->path())){
            return view($request->path());
        }
    }
}
