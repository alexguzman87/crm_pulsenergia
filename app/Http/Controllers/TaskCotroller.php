<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskCreateRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskCotroller extends Controller
{

    public function store(TaskCreateRequest $request)
    {
        $Task=new Task();
        $Task->id_user=$request->input('id_user');
        $Task->task=$request->input('task');
        $Task->priority=$request->input('priority');
        $Task->status=$request->input('status');
        $Task->assigned_date=$request->input('assigned_date');
        $Task->done_date=$request->input('done_date');

        $Task->save();

        return redirect()->back();
    }

}
