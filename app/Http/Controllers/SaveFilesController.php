<?php

namespace App\Http\Controllers;

use App\Http\Requests\SaveFileRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FileSave;
use Illuminate\Support\Facades\Session;

class SaveFilesController extends Controller
{

    public function store_file_lead(SaveFileRequest $request){

        $file=new FileSave;
        $file->id_contact=$request->input('id_contact');
        $file->fileName=$request->input('fileName');
        $contactId=$request->input('id_contact');
        if($request->hasFile('file')){
            $fileUpdate=$request->file('file');
            $extension = $fileUpdate->getClientOriginalName();
            $date = now()->format('Ymd_His');
            $filename = $date."_".$contactId."_".$extension;
            $fileUpdate->move('files/',$filename);
            $file->file=$filename;
        }
        $file->save();

        Session::flash('success_green','Se ha agregado un archivo con éxito');

        return redirect()->back();       

    }

    public function download_file_lead($id){
        $id = public_path('files/'.$id);
        return response()->download($id);
    }

    public function store_file_oportunity(SaveFileRequest $request){

        $file=new FileSave;
        $file->id_oportunity=$request->input('id_oportunity');
        $file->fileName=$request->input('fileName');
        $oportunityId=$request->input('id_oportunity');
        if($request->hasFile('file')){
            $fileUpdate=$request->file('file');
            $extension = $fileUpdate->getClientOriginalName();
            $date = now()->format('Ymd_His');
            $filename = $date."_".$oportunityId."_".$extension;
            $fileUpdate->move('files/',$filename);
            $file->file=$filename;
        }
        $file->save();

        Session::flash('success_green','Se ha agregado un archivo con éxito');

        return redirect()->back();       

    }

    public function download_file_oportunity($id){
        $id = public_path('files/'.$id);
        return response()->download($id);
    }


    public function destroy($id){
        $file = FileSave::find($id);
        $file->delete();
        if(auth()->user()->type_user=='admin'){
            return redirect('lead');
        }else{
            return redirect()->route('lead_show_user', auth()->user()->id);
        }
    }

    public function destroy_oportunity($id){
        $file = FileSave::find($id);
        $file->delete();
        if(auth()->user()->type_user=='admin'){
            return redirect('oportunity');
        }else{
            return redirect()->route('oportunity_show_user', auth()->user()->id);
        }
    }


}