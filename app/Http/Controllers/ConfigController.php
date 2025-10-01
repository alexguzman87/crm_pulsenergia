<?php

namespace App\Http\Controllers;

use App\Models\LevelLead;
use App\Models\LoginRegister;
use App\Models\Origin;
use App\Models\TypesLead;
use App\Models\User;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;

class ConfigController extends Controller
{

    //CONFING ORIGIN

    public function index_origin()
    {

        $origin = Origin::all();

        $origin = Origin::orderBy('name')->paginate(25);

        return view('config.origin',compact('origin'));

    }

    public function create_origin() {
        $origin = Origin::all();

        return view('config.originCreate',compact('origin'));
    }

    public function store_origin(Request $request)
    {
        $origin=new Origin();
        $origin->name=$request->input('name');
        
        $origin->save();
        
        Session::flash('cliente_creado','El cliente ha sido registrado con éxito');

        return redirect("config_lead_origin");
    }

    public function edit_origin($id)
    {
        $origin=Origin::findOrFail($id);
        return view ('config.originUpdate', compact('origin'));
    }

    public function update_origin(Request $request, $id)
    {
        $origin=Origin::findOrFail($id);
        $origin->name=$request->input('name');
        
        $origin->update();
        
        return redirect("config_lead_origin");                
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_origin($id)
    {
        
        $origin=Origin::find($id);
        $origin->delete();

        //unlink(public_path('images/'.$client -> image)); $client->delete();

        return redirect()->back();
        
    }

    //**************CONFING LEVEL LEAD*************

    public function index_level()
    {

        $level = LevelLead::all();

        $level = LevelLead::orderBy('name')->paginate(25);

        return view('config.LevelLead',compact('level'));

    }

    public function create_level(){

        $level = LevelLead::all();

        return view('config.levelCreate',compact('level'));
        
    }

    public function store_level(Request $request)
    {
        $level=new LevelLead();
        $level->name=$request->input('name');
        
        $level->save();
        
        Session::flash('cliente_creado','El cliente ha sido registrado con éxito');

        return redirect("config_level_lead");
    }

    public function edit_level($id)
    {
        $level=LevelLead::findOrFail($id);
        return view ('config.levelUpdate', compact('level'));
    }

    public function update_level(Request $request, $id)
    {
        $level=LevelLead::findOrFail($id);
        $level->name=$request->input('name');
        
        $level->update();
        
        return redirect("config_level_lead");                
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_level($id)
    {
        
        $level=LevelLead::find($id);
        $level->delete();

        //unlink(public_path('images/'.$client -> image)); $client->delete();

        return redirect()->back();
        
    }

    //**************CONFING TYPES LEAD*************

    public function index_type()
    {

        $type = TypesLead::all();

        $type = TypesLead::orderBy('name')->paginate(25);

        return view('config.TypeLead',compact('type'));

    }

    public function create_type(){

        $type = TypesLead::all();

        return view('config.typeCreate',compact('type'));
        
    }

    public function store_type(Request $request)
    {
        $type=new TypesLead();
        $type->name=$request->input('name');
        
        $type->save();
        
        Session::flash('cliente_creado','El cliente ha sido registrado con éxito');

        return redirect("config_type_lead");

    }

    public function edit_type($id)
    {
        $type=TypesLead::findOrFail($id);
        return view ('config.typeUpdate', compact('type'));
    }

    public function update_type(Request $request, $id)
    {
        $type=TypesLead::findOrFail($id);
        $type->name=$request->input('name');
        
        $type->update();
        
        return redirect("config_type_lead");                
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy_type($id)
    {
        
        $type=TypesLead::find($id);
        $type->delete();

        //unlink(public_path('images/'.$client -> image)); $client->delete();

        return redirect()->back();
        
    }

    //**************REGISTER LOGIN*************

    public function register_login(Request $request)
    {

        $query = LoginRegister::orderBy('created_at', 'DESC');

        if ($request->filled('user_id')) {
            $query->where('id_user', $request->input('user_id'));
        }

        if ($request->filled('created_at_start')) {
            $query->whereDate('created_at', '>=', $request->input('created_at_start'));
        }

        if ($request->filled('created_at_end')) {
            $query->whereDate('created_at', '<=', $request->input('created_at_end'));
        }

        $register_login = $query->paginate(500)->withQueryString();

        $users = User::all();
        
        return view('config.register_login',compact('register_login', 'users'));

    }

}
