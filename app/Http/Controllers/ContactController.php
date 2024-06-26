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

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $contact = Contact::orderBy('id')
            ->name($request->search_name)
            ->email($request->search_email)
            ->id($request->search_id)
            ->phone($request->search_phone)
            ->date($request->search_created_at)
            ->paginate(25);
        //where('id', 'Like', "%$request->$search_id%")

                
        return view('contact.contact',compact('contact'));

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
        $contact->notes=$request->input('notes');

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

        $task = Task::all();

        $user = User::all();

        $origin = Origin::all();

        $file = FileSave::where('id_contact', $id)->get();

        return view ('contact.contactEdit', compact('contact', 'task', 'user','origin','file'));

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
        $contact->id_origins=$request->input('id_origins');
        $contact->email=$request->input('email');
        $contact->second_email=$request->input('second_email');
        $contact->phone=$request->input('phone');
        $contact->second_phone=$request->input('second_phone');
        $contact->notes=$request->input('notes');

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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        /*
        $client=Client::findOrFail($id);
        
        if($client->image==null){$client->delete();}else{
            unlink(public_path('images/'.$client -> image));
            $client->delete();
        }

        //unlink(public_path('images/'.$client -> image)); $client->delete();

        Session::flash('cliente_borrado','Los datos del cliente han sido eliminado con éxito');

        return redirect("clientes");
        */
    }
}
