<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Models\Contact;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TaskCotroller extends Controller
{

    public function index(){
        $task = Task::all();

        $task = Task::orderby('assigned_date')->paginate(25);

        return view ('generalTask.generalTask',compact('task'));
    }

    public function store_lead(TaskCreateRequest $request)
    {
        $Task=new Task();
        $Task->id_user=$request->input('id_user');
        $Task->id_contact=$request->input('id_contact');
        $Task->task=$request->input('task');
        $Task->task_origin=$request->input('task_origin');
        $Task->priority=$request->input('priority');
        $Task->status=$request->input('status');
        $Task->assigned_date=$request->input('assigned_date');
        $Task->done_date=$request->input('done_date');

        $Task->save();

        Session::flash('success_green','Se ha agregado una tarea con éxito');

        return redirect()->back();
    }

    public function store_oportunity(TaskCreateRequest $request)
    {
        $Task=new Task();
        $Task->id_user=$request->input('id_user');
        $Task->id_oportunity=$request->input('id_oportunity');
        $Task->task_origin=$request->input('task_origin');
        $Task->task=$request->input('task');
        $Task->priority=$request->input('priority');
        $Task->status=$request->input('status');
        $Task->assigned_date=$request->input('assigned_date');
        $Task->done_date=$request->input('done_date');

        $Task->save();

        Session::flash('success_green','Se ha agregado una tarea con éxito');

        return redirect()->back();
    }



}
