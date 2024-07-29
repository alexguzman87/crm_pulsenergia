<?php

namespace App\Http\Controllers;

use App\Models\Postsales;
use Illuminate\Http\Request;

class PostsaleController extends Controller
{
    public function store(Request $request)
    {
        $postsales=new Postsales();
        $postsales->id_contact=$request->input('id_contact');
        $postsales->id_oportunity=$request->input('id_oportunity');
        $postsales->notes=$request->input('notes');
        $postsales->save();

        return redirect()->back();
    }

}
