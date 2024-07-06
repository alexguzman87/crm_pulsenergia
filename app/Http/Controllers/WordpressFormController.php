<?php

namespace App\Http\Controllers;

use App\Models\WordpressForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WordpressFormController extends Controller
{
    
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
}
