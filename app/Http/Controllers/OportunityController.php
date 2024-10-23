<?php

namespace App\Http\Controllers;

use App\Http\Requests\OportunityRequest;
use App\Http\Requests\OportunityEditRequest;
use App\Models\Contact;
use App\Models\Country;
use App\Models\FileSave;
use App\Models\LevelLead;
use App\Models\Note;
use App\Models\Oportunity;
use App\Models\Origin;
use App\Models\State;
use App\Models\Task;
use App\Models\TypesLead;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function index_list(Request $request)
    {
        $oportunity=Oportunity::all();

        $oportunity = Oportunity::orderBy('id')->paginate(25);

        $user=User::all();
                               
        return view('oportunity.index_list',compact('oportunity', 'user'));

    }


    public function create()
    {
        $origin=Origin::all();

        $type=TypesLead::all();

        $level=LevelLead::all();

        $user=User::all();

        $country = Country::all();

        $state = State::orderBy('name')->get();
        
        return view('oportunity.create', compact('origin', 'type', 'level','user','country','state'));
    }

    public function store(Request $request)
    {       
        $oportunity=new Oportunity();
        $oportunity->title=$request->input('title');
        $oportunity->contact_name=$request->input('contact_name');
        $oportunity->organization=$request->input('organization');
        $oportunity->id_user=$request->input('id_user');
        $oportunity->email=$request->input('email');
        $oportunity->phone=$request->input('phone');
        $oportunity->country=$request->input('country');
        $oportunity->state=$request->input('state');
        $oportunity->address=$request->input('address');
        $oportunity->coordinate=$request->input('coordinate');
        $oportunity->street=$request->input('street');
        $oportunity->city=$request->input('city');
        $oportunity->postal_code=$request->input('postal_code');
        $oportunity->status=$request->input('status');
        $oportunity->budget=$request->input('budget');
        $oportunity->probability=$request->input('probability');
        $oportunity->description=$request->input('description');
        $oportunity->id_origins=$request->input('id_origins');
        $oportunity->id_level=$request->input('id_level');
        $oportunity->id_type=$request->input('id_type');
        
        $oportunity->save();

        if(!Contact::where('phone',$request->input('phone'))->first()){
            $contact=new Contact();
            $contact->name = $request->input('contact_name');
            $contact->phone = $request->input('phone');
            $contact->id_user=$request->input('id_user');
            $contact->email=$request->input('email');
            $contact->phone=$request->input('phone');
            $contact->country=$request->input('country');
            $contact->state=$request->input('state');
            $contact->street=$request->input('street');
            $contact->address=$request->input('address');
            $contact->coordinate=$request->input('coordinate');
            $contact->city=$request->input('city');
            $contact->postal_code=$request->input('postal_code');
            $contact->id_origins=$request->input('id_origins');
            $contact->id_level=$request->input('id_level');
            $contact->id_type=$request->input('id_type');
            if($request->input('status') == 'sale'){
                $contact->type = 'client';
            }
            $contact->save();

            $contactId = Contact::latest()->first()->id;
            $oportunityId = Oportunity::latest()->first()->id;
            $assignedId = Oportunity::findOrFail($oportunityId);
            $assignedId->id_contact = $contactId;
            $assignedId->update();
        }


        Session::flash('success_green','Los datos de la Oportunidad han sido agregados con éxito');
        
        if(auth()->user()->type_user=='admin'){
            return redirect('oportunity');
        }else{
            return redirect()->route('oportunity_show_user', auth()->user()->id);
        }
    }

    public function show($id)
    {    
        $user=User::all();
        
        if(auth()->user()->id == 8){

            $oportunity_user=Oportunity::whereIn('id_user',[8,11])->get();

            $oportunity=Oportunity::where('status','oportunity')->whereIn('id_user',[8,11])->get();
            $proposal=Oportunity::where('status','proposal')->whereIn('id_user',[8,11])->get();
            $need=Oportunity::where('status','need')->whereIn('id_user',[8,11])->get();
            $sale=Oportunity::where('status','sale')->whereIn('id_user',[8,11])->get();
            $lost=Oportunity::where('status','lost')->whereIn('id_user',[8,11])->get();

        }else{

            $oportunity_user=Oportunity::where('id_user',$id)->get();

            $oportunity=Oportunity::where('status','oportunity')->where('id_user',$id)->get();
            $proposal=Oportunity::where('status','proposal')->where('id_user',$id)->get();
            $need=Oportunity::where('status','need')->where('id_user',$id)->get();
            $sale=Oportunity::where('status','sale')->where('id_user',$id)->get();
            $lost=Oportunity::where('status','lost')->where('id_user',$id)->get();

        }    

        return view ('oportunity.show', compact('oportunity_user', 'oportunity','proposal','need','sale','lost','user'));
    }

    public function show_list($id)
    {    
        $user=User::all();

        if(auth()->user()->id == 8){
        
            $oportunity=Oportunity::whereIn('id_user',[8,11])->get();

        }else{

            $oportunity=Oportunity::where('id_user',$id)->get();

        }

        $oportunity_user=Oportunity::orderBy('id')->paginate(25);

        return view ('oportunity.show_list', compact('oportunity', 'oportunity_user', 'user'));
    }


    public function edit($id)
    {
        $oportunity=Oportunity::findOrFail($id);

        $task = Task::where('id_oportunity', $id)->get();

        $user = User::all();

        $notes = Note::where('id_oportunity', $id)->get();

        $file = FileSave::where('id_oportunity', $id)->get();

        $origin=Origin::all();

        $type=TypesLead::all();

        $level=LevelLead::all();

        $country = Country::all();

        $state = State::all();

        return view ('oportunity.Edit', compact('oportunity', 'user', 'task','notes','file', 'origin', 'type', 'level', 'state', 'country'));

    }

    public function updateStatus(Request $request, $id)
    {       
        $oportunity=Oportunity::findOrFail($id);
        $oportunity->status=$request->input('status');

        if($request->input('status') == 'sale'){
            $id_contact = $oportunity->id_contact;            
            $contact = Contact::findOrFail($id_contact);
            $contact->type = 'client';
            $contact->update();
        }
                
        $oportunity->update();
        
        return redirect()->back();

    }

    public function update(Request $request, $id)
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
        $oportunity->coordinate=$request->input('coordinate');
        $oportunity->street=$request->input('street');
        $oportunity->street=$request->input('street');
        $oportunity->city=$request->input('city');
        $oportunity->postal_code=$request->input('postal_code');
        $oportunity->status=$request->input('status');
        $oportunity->budget=$request->input('budget');
        $oportunity->probability=$request->input('probability');
        $oportunity->description=$request->input('description');
        $oportunity->id_origins=$request->input('id_origins');
        $oportunity->id_level=$request->input('id_level');
        $oportunity->id_type=$request->input('id_type');        

        if($request->input('status') == 'sale'){
            $id_contact = $oportunity->id_contact;
            $contact = Contact::findOrFail($id_contact);
            $contact->type = 'client';
            $contact->update();
        }


        $oportunity->update();

        

        Session::flash('success_green','Los datos de la Oportunidad han sido modificados con éxito');
        
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
        
        $oportunity = Oportunity::find($id);
        $oportunity->delete();      
       
        Task::where(['id_oportunity'=>$id])->delete();

        Note::where(['id_oportunity'=>$id])->delete();

        FileSave::where(['id_oportunity'=>$id])->delete();      

        Session::flash('danger_red','Los datos de la Oportunidad han sido eliminados con éxito');

        if(auth()->user()->type_user=='admin'){
            return redirect('oportunity');
        }else{
            return redirect()->route('oportunity_show_user', auth()->user()->id);
        }

    }
}
