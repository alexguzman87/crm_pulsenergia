<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index_calendar(){

        $all_events = Task::all();

        $events = [];

        foreach($all_events as $event){
            
            $color = null;

            if($event->status=='pendiente'){
                $color = '#ef7564';
            }else if($event->status=='en_proceso'){
                $color = '#ffb968';
            }else if($event->status=='hecho'){
                $color = '#7bc86c';
            }

            $events [] = [
                'title'=>$event->task,
                'start'=>$event->assigned_date,
                'end'=>$event->done_date,
                'color'=> $color
            ];
        }

        return view('calendar.indexCalendar',compact('events'));
        
    }

    public function index_calendar_user($id){

    
            $all_events = Task::where('id_user',$id)->get();

            $events = [];
    
            foreach($all_events as $event){
                
                $color = null;
    
                if($event->status=='pendiente'){
                    $color = '#ef7564';
                }else if($event->status=='en_proceso'){
                    $color = '#ffb968';
                }else if($event->status=='hecho'){
                    $color = '#7bc86c';
                }
    
                $events [] = [
                    'title'=>$event->task,
                    'start'=>$event->assigned_date,
                    'end'=>$event->done_date,
                    'color'=> $color
                ];
            }
    
            return view('calendar.indexCalendar',compact('events'));




        

    }


}
