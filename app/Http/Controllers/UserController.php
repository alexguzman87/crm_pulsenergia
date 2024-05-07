<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::all();

        $users = User::orderBy('id')->paginate(25);
                
        return view('user.user',compact('users'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.userCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user=new User;
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->save();
        
        Session::flash('cliente_creado','El cliente ha sido registrado con éxito');

        return redirect('/user');
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
        $user=User::findOrFail($id);
        return view ('user.userEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->password=$request->input('password');

        $user->update();
        
        return redirect("user");

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
