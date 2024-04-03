<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $contact = Contact::all();

        $contact = Contact::orderBy('name')->paginate(2);
                
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
    public function store(Request $request)
    {
        $contact=new Contact();
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->second_email=$request->input('second_email');
        $contact->phone=$request->input('phone');
        $contact->second_phone=$request->input('second_phone');
        $contact->notes=$request->input('notes');

        $contact->save();
        
        return redirect('/contact');
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
        return view ('contact.contactEdit', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contact=Contact::findOrFail($id);
        $contact->name=$request->input('name');
        $contact->email=$request->input('email');
        $contact->second_email=$request->input('second_email');
        $contact->phone=$request->input('phone');
        $contact->second_phone=$request->input('second_phone');
        $contact->notes=$request->input('notes');

        $contact->update();
        
        return redirect("contact");

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
