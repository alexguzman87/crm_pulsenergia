<?php

namespace App\Http\Controllers;

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

        $users = User::orderBy('name')->paginate(2);
                
        return view('user.user',compact('users'));

        //return view('prueba',compact('users'));
        /*$identification_number = $request->get('identification_number');
        $birth_date = $request->get('birth_date');
        $name = $request->get('name');
        $lastname = $request->get('lastname');
        $phone_number  = $request->get('phone_number');
        $address = $request->get('address');
        
        $client = Client::orderBy('identification_number')
            ->identification_number($identification_number)
            ->birth_date($birth_date)
            ->name($name)
            ->lastname($lastname)
            ->phone_number($phone_number)
            ->address($address)
            ->paginate(10);

        return view('clients.index_client', compact('client'));*/
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

        return redirect('/user_create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
