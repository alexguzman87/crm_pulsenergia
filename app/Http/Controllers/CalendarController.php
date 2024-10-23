<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index_calendar(){

        if(auth()->user()->type_user=='admin'){
        
            $all_events = Task::all();

            $events = [];
    
            foreach($all_events as $event){
                
                $color = null;
                
                if($event->task_origin == 'general'){
                    $color = '#7ac3db';
                }
                else{
                    if($event->status=='pendiente'){
                        $color = '#ef7564';
                    }else if($event->status=='en_proceso'){
                        $color = '#ffb968';
                    }else if($event->status=='hecho'){
                        $color = '#7bc86c';
                    }
                }
    
                $events [] = [
                    'title'=>date("H:i", strtotime($event->assigned_time)) . " - " . $event->task,
                    'start'=>$event->assigned_date,
                    'end'=>$event->done_date,
                    'url'=>$event->coordinate,
                    'color'=> $color,
                    'id'=>$event->id,
                ];
            }
    
            return view('calendar.indexCalendar',compact('events'));
            
        }elseif(auth()->user()->id == 8){
    
            $all_events = Task::whereIn('id_user',[8,11])->get();

            $events = [];

            foreach($all_events as $event){

                $color = null;

                if($event->task_origin == 'general'){
                    $color = '#7ac3db';
                }
                else{
                    if($event->status=='pendiente'){
                        $color = '#ef7564';
                    }else if($event->status=='en_proceso'){
                        $color = '#ffb968';
                    }else if($event->status=='hecho'){
                        $color = '#7bc86c';
                    }
                }

                $events [] = [
                    'title'=>$event->task,
                    'start'=>$event->assigned_date,
                    'end'=>$event->done_date,
                    'color'=> $color
                ];
            }

            return view('calendar.indexCalendar',compact('events'));
        
        }else{
    
            $all_events = Task::where('id_user',auth()->user()->id)->get();

            $events = [];

            foreach($all_events as $event){

                $color = null;

                if($event->task_origin == 'general'){
                    $color = '#7ac3db';
                }
                else{
                    if($event->status=='pendiente'){
                        $color = '#ef7564';
                    }else if($event->status=='en_proceso'){
                        $color = '#ffb968';
                    }else if($event->status=='hecho'){
                        $color = '#7bc86c';
                    }
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


}
