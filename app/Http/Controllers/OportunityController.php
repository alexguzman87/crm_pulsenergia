<?php

namespace App\Http\Controllers;

use App\Http\Requests\OportunityRequest;
use App\Models\Oportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OportunityController extends Controller
{
    public function index(Request $request)
    {
        $oportunity=Oportunity::where('status','oportunity' )->get();
        $proposal=Oportunity::where('status','proposal' )->get();
        $need=Oportunity::where('status','need' )->get();
        $sale=Oportunity::where('status','sale' )->get();
        $lost=Oportunity::where('status','lost' )->get();        

/*
        $contact = Contact::orderBy('id')
            ->name($request->search_name)
            ->email($request->search_email)
            ->id($request->search_id)
            ->phone($request->search_phone)
            ->date($request->search_created_at)
            ->paginate(25);
        //where('id', 'Like', "%$request->$search_id%")*/

                
        return view('oportunity.index',compact('oportunity','proposal','need','sale','lost'));

    }

    public function create()
    {
        return view('oportunity.create');
    }

    public function store(OportunityRequest $request)
    {       
        $oportunity=new Oportunity();
        $oportunity->title=$request->input('title');
        $oportunity->contact_name=$request->input('contact_name');
        $oportunity->organization=$request->input('organization');
        $oportunity->email=$request->input('email');
        $oportunity->phone=$request->input('phone');
        $oportunity->country=$request->input('country');
        $oportunity->state=$request->input('state');
        $oportunity->address=$request->input('address');
        $oportunity->city=$request->input('city');
        $oportunity->postal_code=$request->input('postal_code');
        $oportunity->status=$request->input('status');
        $oportunity->type=$request->input('type');
        $oportunity->budget=$request->input('budget');
        $oportunity->currency=$request->input('currency');
        $oportunity->probability=$request->input('probability');
        $oportunity->description=$request->input('description');
        
        $oportunity->save();

        Session::flash('success_green','Los datos de la Oportunidad han sido agregados con éxito');
        
        return redirect('oportunity');

    }

    public function updateStatus(Request $request, $id)
    {       
        $oportunity=Oportunity::findOrFail($id);

        $oportunity->status=$request->input('status');
                
        $oportunity->update();
        
        return redirect()->back();

    }


    public function edit($id)
    {
        $contact=Contact::findOrFail($id);

        $task = Task::where('id_contact', $id)->get();

        $user = User::all();

        $origin = Origin::all();

        $notes = Note::where('id_contact', $id)->get();

        $file = FileSave::where('id_contact', $id)->get();

        return view ('contact.contactEdit', compact('contact', 'task', 'user','origin','file','notes'));

    }

    public function update(ContactEditRequest $request, $id)
    {
        $contact=Contact::findOrFail($id);

        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->second_email=$request->input('second_email');
        $contact->phone=$request->input('phone');
        $contact->second_phone=$request->input('second_phone');
        $contact->country=$request->input('country');
        $contact->state=$request->input('state');
        $contact->address=$request->input('address');
        $contact->city=$request->input('city');
        $contact->postal_code=$request->input('postal_code');
        $contact->id_origins=$request->input('id_origins');
        $contact->lead_level=$request->input('lead_level');
        if($request->hasFile('image')){
            if (!$request->hasFile('image')||$contact->image==null)
            {
                    $file=$request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time()."_".$contact->id.".".$extension;
                    $file->move('images/',$filename);
                    $contact->image=$filename;
                }else{
                    unlink(public_path('images/'.$contact -> image));
                    $file=$request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time()."_".$contact->id."_".$contact->name."_".$extension;
                    $file->move('images/',$filename);
                    $contact->image=$filename;
                }
        }

        $contact->update();

        Session::flash('success_green','Los datos del Lead han sido modificados con éxito');
        
        return redirect()->back();

        /*
        if($request->hasFile('image')){
            if (!$request->hasFile('image')||$client->image==null)
            {
                    $file=$request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time()."_".$client->identification_number.".".$extension;
                    $file->move('images/',$filename);
                    $client->image=$filename;
                }else{
                    unlink(public_path('images/'.$client -> image));
                    $file=$request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time()."_".$client->identification_number.".".$extension;
                    $file->move('images/',$filename);
                    $client->image=$filename;
                }
        }*/
                
       
    }


    public function destroy($id)
    {
        $contact=Contact::find($id);
        $contact->delete();

        Session::flash('danger_red','Los datos del Lead han sido eliminado con éxito');

        return redirect()->back();
    }
}
