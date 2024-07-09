<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactEditRequest;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use App\Models\Origin;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\FileSave;
use App\Models\LevelLead;
use App\Models\Note;
use App\Models\TypesLead;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $origin=Origin::orderBy('name')->get();

        $type=LevelLead::orderBy('name')->get();

        $level=TypesLead::orderBy('name')->get();

        $contact = Contact::orderBy('id')
            ->name($request->search_name)
            ->email($request->search_email)
            ->id($request->search_id)
            ->phone($request->search_phone)
            ->date($request->search_created_at)
            ->paginate(25);
        //where('id', 'Like', "%$request->$search_id%")

                
        return view('contact.contact',compact('contact','origin','type','level'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.contactCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContactRequest $request)
    {       
        $contact=new Contact();
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
        $contact->id_level=$request->input('id_level');
        $contact->id_type=$request->input('id_type');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time()."_".$contact->id.".".$extension;
            $file->move('images/',$filename);
            $contact->image=$filename;
        }else{
            $filename = "user/Sin-Perfil-Hombre.png";
            $contact->image=$filename;
        }

        $contact->save();
        
        return redirect('lead');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /*$client=Client::findOrFail($id);
        return view ('clients.show_client', compact('client'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact=Contact::findOrFail($id);

        $task = Task::where('id_contact', $id)->get();

        $user = User::all();

        $origin = Origin::all();

        $level=LevelLead::all();

        $type=TypesLead::all();

        $notes = Note::where('id_contact', $id)->get();

        $file = FileSave::where('id_contact', $id)->get();

        return view ('contact.contactEdit', compact('contact', 'task', 'user','origin','file','notes','type','level'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $contact->id_level=$request->input('id_level');
        $contact->id_type=$request->input('id_type');
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
       
    }


    public function updateUser(Request $request, $id)
    {
        $contact=Contact::findOrFail($id);

        $contact->id_user=$request->input('id_user');        

        $contact->update();

        Session::flash('success_green','Se ha asignado un Responsable');
        
        return redirect()->back();                
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $contact=Contact::find($id);
        $contact->delete();

        Session::flash('danger_red','Los datos del Lead han sido eliminado con éxito');

        return redirect()->back();
    }
}
