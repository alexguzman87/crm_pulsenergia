<?php

namespace App\Http\Controllers;

use App\Models\WordpressForm;
use Illuminate\Http\Request;

class WordpressFormController extends Controller
{
    
    public function ShowForm()
    {

        $form = WordpressForm::all();

        $users = WordpressForm::orderBy('entry_id')->paginate(25);
            
        return view('contactWeb.contactWeb',compact('form'));

    }
}
