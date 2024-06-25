<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\FileSave;

class SaveFilesController extends Controller
{

    public function storeFile(Request $request){

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

        return redirect()->back();       
        
        
        /*if($request->isMethod('POST')){
            $file = $request->file('file');
            $contactName = $request->input('contact_name');
            $fileName = $request->input('fileName');
            $date = now()->format('Ymd-His');
            $file->storeAs('',$date.".".$contactName.".".$fileName.".".$file->extension(),'public');
        };*/

    }

    public function downloadFile($id){
        $id = public_path('files/'.$id);
        return response()->download($id);
    }
}