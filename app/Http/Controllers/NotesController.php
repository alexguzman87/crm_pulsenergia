<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class NotesController extends Controller
{
    public function store_lead(NoteRequest $request)
    {
        $note=new Note();
        $note->id_contact=$request->input('id_contact');
        $note->task_origin=$request->input('task_origin');
        $note->notes=$request->input('notes');

        $note->save();

        Session::flash('success_green','Se ha agregado una nota con éxito');

        return redirect()->back();
    }

    public function store_oportunity(NoteRequest $request)
    {
        $note=new Note();
        $note->id_oportunity=$request->input('id_oportunity');
        $note->task_origin=$request->input('task_origin');
        $note->notes=$request->input('notes');

        $note->save();

        Session::flash('success_green','Se ha agregado una nota con éxito');

        return redirect()->back();
    }

}
