<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteRequest;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;


class NotesController extends Controller
{
    public function store(NoteRequest $request)
    {
        $note=new Note();
        $note->id_contact=$request->input('id_contact');
        $note->notes=$request->input('notes');

        $note->save();

        Session::flash('success_green','Se ha agregado una tarea con éxito');

        return redirect()->back();
    }
}
