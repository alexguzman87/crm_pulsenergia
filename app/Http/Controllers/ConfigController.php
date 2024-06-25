<?php

namespace App\Http\Controllers;
use App\Models\Origin;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ConfigController extends Controller
{

    public function index()
    {

        $origin = Origin::all();

        $origin = Origin::orderBy('id')->paginate(25);

        return view('config.origin',compact('origin'));

    }

    public function store(Request $request)
    {
        $origin=new Origin();
        $origin->name=$request->input('name');
        
        $origin->save();
        
        Session::flash('cliente_creado','El cliente ha sido registrado con éxito');

        return redirect()->back();
    }

    public function edit($id)
    {
        $origin=Origin::findOrFail($id);
        return view ('config.originUpdate', compact('origin'));
    }

    public function update(Request $request, $id)
    {
        $origin=Origin::findOrFail($id);
        $origin->name=$request->input('name');
        
        $origin->update();
        
        return redirect("config_origin");;                
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $origin=Origin::find($id);
        $origin->delete();

        //unlink(public_path('images/'.$client -> image)); $client->delete();

        return redirect()->back();
        
    }



}
