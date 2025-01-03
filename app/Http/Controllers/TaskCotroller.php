<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Http\Requests\TaskEditRequest;
use App\Models\Contact;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskCotroller extends Controller
{

    public function index(){
        
        if(auth()->user()->type_user=='admin'){
        
        $task = Task::all();

        $task = Task::orderby('assigned_date')->paginate(25);

        return view ('generalTask.generalTask',compact('task'));
        
        }elseif(auth()->user()->id == 8){

            $task = Task::whereIn('id_user', [8,11])->paginate(25);

            return view ('generalTask.generalTask',compact('task'));

        }else{

            $task = Task::where('id_user',auth()->user()->id)->paginate(25);

            return view ('generalTask.generalTask',compact('task'));
        }
    }

    public function store_lead(Request $request)
    {
        $Task=new Task();
        $Task->id_user=$request->input('id_user');
        $Task->id_contact=$request->input('id_contact');
        $Task->task=$request->input('task');
        $Task->coordinate=$request->input('coordinate');
        $Task->task_origin=$request->input('task_origin');
        $Task->priority=$request->input('priority');
        $Task->status=$request->input('status');
        $Task->assigned_date=$request->input('assigned_date');
        $Task->assigned_time=$request->input('assigned_time');
        $Task->done_date=$request->input('done_date');
        $Task->done_time=$request->input('done_time');

        $Task->save();

        Session::flash('success_green','Se ha agregado una tarea con éxito');

        return redirect()->back();
    }

    public function store_oportunity(Request $request)
    {
        $Task=new Task();
        $Task->id_user=$request->input('id_user');
        $Task->id_oportunity=$request->input('id_oportunity');
        $Task->task_origin=$request->input('task_origin');
        $Task->task=$request->input('task');
        $Task->coordinate=$request->input('coordinate');
        $Task->priority=$request->input('priority');
        $Task->status=$request->input('status');
        $Task->assigned_date=$request->input('assigned_date');
        $Task->assigned_time=$request->input('assigned_time');
        $Task->done_date=$request->input('done_date');
        $Task->done_time=$request->input('done_time');

        $Task->save();

        Session::flash('success_green','Se ha agregado una tarea con éxito');

        return redirect()->back();
    }

    public function update_priority(Request $request, $id)
    {
        $task=Task::findOrFail($id);

        $task->priority=$request->input('priority');        

        $task->update();

        Session::flash('success_green','Se ha modificado la Prioridad de la tarea');
        
        return redirect()->back();                
       
    }

    public function update_status(Request $request, $id)
    {
        $task=Task::findOrFail($id);

        $task->status=$request->input('status');        

        $task->update();

        Session::flash('success_green','Se ha modificado el Estado de la tarea');
        
        return redirect()->back();                
       
    }

    public function edit_task($id){
        
        $task = Task::findOrFail($id);
        
        return view ('generalTask.generalEditTask', compact('task'));

    }

    public function task_update(Request $request, $id)
    {
        $task=Task::findOrFail($id);
        
        $task->id_user=$request->input('id_user');
        $task->id_oportunity=$request->input('id_oportunity');
        $task->task_origin=$request->input('task_origin');
        $task->task=$request->input('task');
        $task->coordinate=$request->input('coordinate');
        $task->priority=$request->input('priority');
        $task->status=$request->input('status');
        $task->done_date=$request->input('done_date');
        $task->done_time=$request->input('done_time');

        $task->update();

        Session::flash('success_green','Se ha agregado una tarea con éxito');

        return redirect('general_task');
    }

    public function destroy($id)
    {
        $task=Task::find($id);
        $task->delete();

        Session::flash('danger_red','Los datos de la Tarea han sido eliminados con éxito');

        return redirect()->back();
    }


}
