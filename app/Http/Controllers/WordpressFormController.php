<?php

namespace App\Http\Controllers;

use App\Models\WordpressForm;
use Illuminate\Http\Request;

class WordpressFormController extends Controller
{
    
    public function ShowForm(Request $request)
    {

        $form = WordpressForm::all();

        $form = WordpressForm::orderBy('entry_id')
            /*->fields($request->search_name)
            ->email($request->search_email)
            ->id($request->search_id)
            ->phone($request->search_phone)
            ->date($request->search_created_at)*/
            ->paginate(25);
            
        return view('contactWeb.contactWeb',compact('form'));

    }
}
