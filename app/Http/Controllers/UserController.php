<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserPassEditRequest;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\View;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $users = User::all();

        $users = User::orderBy('id')
            ->id($request->search_id)
            ->type_user($request->search_type)
            ->name($request->search_name)
            ->email($request->search_email)
            ->username($request->search_username)
            ->paginate(25);
                
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
    public function store(UserRequest $request)
    {
        $user=new User;
        $user->name=$request->input('name');
        $user->username=$request->input('username');
        $user->email=$request->input('email');
        $user->password=$request->input('password');
        $user->type_user=$request->input('type_user');
        if($request->hasFile('image')){
            $file=$request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time()."_".$user->id.".".$extension;
            $file->move('images/',$filename);
            $user->image=$filename;
        }else{
            $filename = "/user/Sin-Perfil-Hombre.png";
            $user->image=$filename;
        }
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

    public function edit_pass($id)
    {
        $user=User::findOrFail($id);
        return view ('user.userEditPassword', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_pass(UserPassEditRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $user->password=$request->input('password');

        $user->update();
        
        return redirect("user");
       
    }

    public function update(UserEditRequest $request, $id)
    {
        $user=User::findOrFail($id);
        $user->email=$request->input('email');
        $user->username=$request->input('username');
        $user->name=$request->input('name');
        $user->type_user=$request->input('type_user');
        if($request->hasFile('image')){
            if (!$request->hasFile('image')||$user->image==null||$user->image=='user/Sin-Perfil-Hombre.png')
            {
                    $file=$request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time()."_".$user->id.".".$extension;
                    $file->move('images/',$filename);
                    $user->image=$filename;
                }else{
                    unlink(public_path('images/'.$user -> image));
                    $file=$request->file('image');
                    $extension = $file->getClientOriginalExtension();
                    $filename = time()."_".$user->id.".".$extension;
                    $file->move('images/',$filename);
                    $user->image=$filename;
                }
        }

        $user->update();
        
        return redirect("user");                
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user=User::find($id);
        $user->delete();

        Session::flash('danger_red','Los datos del Usuario han sido eliminado con éxito');

        return redirect()->back();
        
        /*
        $client=Client::findOrFail($id);
        
        if($client->image==null){$client->delete();}else{
            unlink(public_path('images/'.$client -> image));
            $client->delete();
        }

        //unlink(public_path('images/'.$client -> image)); $client->delete();


        return redirect("clientes");
        */
    }

    public function export() 
    {
        return Excel::download(new UsersExport, 'user.xlsx');
    }


}
