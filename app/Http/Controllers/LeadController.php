<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LeadController extends Controller
{
    public function index()
    {

        $lead = Lead::all();

        $lead = Lead::orderBy('id')->paginate(25);
                
        return view('lead.lead',compact('lead'));

    }

    public function create()
    {
        return view('lead.leadCreate');
    }

    public function store(Request $request)
    {
        $lead=new Lead();
        $lead->name=$request->input('name');
        $lead->fp_cycle=$request->input('fp_cycle');
        $lead->email=$request->input('email');
        $lead->phone_movile=$request->input('phone_movile');
        $lead->country=$request->input('country');
        $lead->state=$request->input('state');
        $lead->address=$request->input('address');
        $lead->city=$request->input('city');
        $lead->postal_code=$request->input('postal_code');
        $lead->notes=$request->input('notes');

        $lead->save();
        
        Session::flash('cliente_creado','El cliente ha sido registrado con éxito');

        return redirect('lead');
    }

}
