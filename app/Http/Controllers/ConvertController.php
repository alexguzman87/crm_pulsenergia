<?php

namespace App\Http\Controllers;

use App\Http\Requests\OportunityRequest;
use App\Models\Contact;
use App\Models\Country;
use App\Models\LevelLead;
use App\Models\Oportunity;
use App\Models\Origin;
use App\Models\State;
use App\Models\Task;
use App\Models\TypesLead;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ConvertController extends Controller
{
    public function show($id)
    {
        $user = User::all();

        $origin = Origin::all();

        $type = TypesLead::all();

        $level = LevelLead::all();
        
        $contact = Contact::find($id);

        $contact_user = Contact::orderBy('id')->paginate(25);

        $country = Country::all();

        $state = State::all();

        return view ('convert.create', compact('user', 'contact', 'contact_user','type', 'origin','level', 'country', 'state'));

    }

    public function convert(OportunityRequest $request , $id){

        $oportunity=new Oportunity;
        $oportunity->title=$request->input('title');
        $oportunity->contact_name=$request->input('contact_name');
        $oportunity->organization=$request->input('organization');
        $oportunity->id_user=$request->input('id_user');
        $oportunity->email=$request->input('email');
        $oportunity->phone=$request->input('phone');
        $oportunity->country=$request->input('country');
        $oportunity->state=$request->input('state');
        $oportunity->address=$request->input('address');
        $oportunity->city=$request->input('city');
        $oportunity->postal_code=$request->input('postal_code');
        $oportunity->status=$request->input('status');
        $oportunity->budget=$request->input('budget');
        $oportunity->probability=$request->input('probability');
        $oportunity->description=$request->input('description');
        $oportunity->id_origins=$request->input('id_origins');
        $oportunity->id_level=$request->input('id_level');
        $oportunity->id_type=$request->input('id_type');
        $oportunity->id_contact=$request->input('id_contact');
        
        $oportunity->save();

        $contact = Contact::findOrFail($id);
        $contact->type='client';
        $contact->update();

        Session::flash('success_green','Los datos de la Oportunidad han sido agregados con éxito');
        
        if(auth()->user()->type_user=='admin'){
            return redirect('oportunity');
        }else{
            return redirect()->route('oportunity_show_user', auth()->user()->id);
        }

    }


}
