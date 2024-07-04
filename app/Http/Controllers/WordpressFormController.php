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

        //$form = WordpressForm::orderBy('id')->get()
            /*->fields($request->search_name)
            ->email($request->search_email)
            ->id($request->search_id)
            ->phone($request->search_phone)
            ->date($request->search_created_at)
            ->paginate(25)*/;
        $name = WordpressForm::where('sub_field_name','first_name')->get();
        $lastName = WordpressForm::where('sub_field_name','last_name')->get();
        $email = WordpressForm::where('field_name','email')->get();
        $phone = WordpressForm::where('field_name','phone')->get();
        $solution = WordpressForm::where('field_name','solution')->get();
        

        $data = [
            'name' => $name,
            'lastname' => $lastName,
            'email' => $email,
            'phone' => $phone,
            'solution' => $solution,
        ];
            
        return view('contactWeb.contactWeb',compact('data'));

    }
}
