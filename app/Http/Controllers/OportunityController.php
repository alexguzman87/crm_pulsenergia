<?php

namespace App\Http\Controllers;

use App\Http\Requests\OportunityRequest;
use App\Models\FileSave;
use App\Models\Note;
use App\Models\Oportunity;
use App\Models\Task;
use App\Models\User;
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
        $user=User::all();
                               
        return view('oportunity.index',compact('oportunity','proposal','need','sale','lost','user'));

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
        $oportunity->probability=$request->input('probability');
        $oportunity->description=$request->input('description');
        
        $oportunity->save();

        Session::flash('success_green','Los datos de la Oportunidad han sido agregados con éxito');
        
        return redirect('oportunity');

    }

    public function show($id)
    {    
        $user=User::all();
        
        $oportunity_user=Oportunity::where('id_user',$id)->get();

        $oportunity=Oportunity::where('status','oportunity')->where('id_user',$id)->get();
        $proposal=Oportunity::where('status','proposal')->where('id_user',$id)->get();
        $need=Oportunity::where('status','need')->where('id_user',$id)->get();
        $sale=Oportunity::where('status','sale')->where('id_user',$id)->get();
        $lost=Oportunity::where('status','lost')->where('id_user',$id)->get();

        return view ('oportunity.show', compact('oportunity_user', 'oportunity','proposal','need','sale','lost','user'));
    }

    public function edit($id)
    {
        $oportunity=Oportunity::findOrFail($id);

        $task = Task::where('id_oportunity', $id)->get();

        $user = User::all();

        $notes = Note::where('id_oportunity', $id)->get();

        $file = FileSave::where('id_oportunity', $id)->get();

        return view ('oportunity.Edit', compact('oportunity', 'user', 'task','notes','file'));

    }

    public function updateStatus(Request $request, $id)
    {       
        $oportunity=Oportunity::findOrFail($id);

        $oportunity->status=$request->input('status');
                
        $oportunity->update();
        
        return redirect()->back();

    }

    public function update(OportunityRequest $request, $id)
    {
        $oportunity=Oportunity::findOrFail($id);

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
        $oportunity->probability=$request->input('probability');
        $oportunity->description=$request->input('description');
        

        $oportunity->update();

        Session::flash('success_green','Los datos del Lead han sido modificados con éxito');
        
        return redirect()->back();                
       
    }

    public function updateUser(Request $request, $id)
    {
        $oportunity=Oportunity::findOrFail($id);

        $oportunity->id_user=$request->input('id_user');        

        $oportunity->update();

        Session::flash('success_green','Se ha asignado un Responsable');
        
        return redirect()->back();                
       
    }


    public function destroy($id)
    {
        $contact=Contact::find($id);
        $contact->delete();

        Session::flash('danger_red','Los datos del Lead han sido eliminado con éxito');

        return redirect()->back();
    }
}
