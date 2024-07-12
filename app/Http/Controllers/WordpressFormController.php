<?php

namespace App\Http\Controllers;

use App\Models\LevelLead;
use App\Models\Origin;
use App\Models\TypesLead;
use App\Models\WordpressForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WordpressFormController extends Controller
{
    
    public function ShowForm(Request $request)
    {

        $form = WordpressForm::all();

        $form = WordpressForm::orderBy('entry_id','DESC')
            /*->fields($request->search_name)
            ->email($request->search_email)
            ->id($request->search_id)
            ->phone($request->search_phone)
            ->date($request->search_created_at)*/
            ->paginate(25);
                        
        return view('leadsWeb.lead_list',compact('form'));

    }

    public function show($id)
    {

        $form=WordpressForm::where('entry_id', $id)->get();

        $origin = Origin::all();

        $level=LevelLead::all();

        $type=TypesLead::all();
                              
        return view('leadsWeb.convert_to_lead',compact('form', 'origin', 'level', 'type'));

    }



}


    /*

    // Código para trabajar la base de datos de FLuent, se tuvo que armar un array especial
    
    public function ShowForm(Request $request)
    {

        $form = WordpressForm::all();

        $formCount = WordpressForm::paginate(25);

        $data = [];

        foreach($form as $f){
        
            $key = ($f->field_name == 'names') ? $f->sub_field_name : $f->field_name;
        
            $data[$f->submission_id][$key] = $f->field_value;
        }
            
        return view('leadsWeb.contacts-list',compact('data','form','formCount'));


    }
*/