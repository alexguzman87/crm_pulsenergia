<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'username'=>'required',
            'type_user'=>'required',
            'email'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'El Nombre es requerido',
            'username.required'=>'El Nombre de Usuario es requerido',
            'type_user.required'=>'El Tipo de Usuario es requerido',
            'email.required'=>'El Correo Electrónico es requerido',
        ];    
    }
}
