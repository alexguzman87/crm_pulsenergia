<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'=>'required',
            'username'=>'required|unique:users',
            'type_user'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'El Nombre es requerido',
            'username.required'=>'El Nombre de Usuario es requerido',
            'username.unique'=>'El Nombre de Usuario ya está siendo usado',
            'type_user.required'=>'El Tipo de Usuario es requerido',
            'email.required'=>'El Correo Electrónico es requerido',
            'email.required'=>'El Correo Electrónico es requerido',
            'email.unique'=>'El Correo Electrónico ya está siendo usado',
            'password.required'=>'La Contraseña es requerida',
            'image.required'=>'La Imagen es requerida',
            'image.image'=>'La Imagen sólo debe tener formatos (jpg, jpeg, png, bmp, gif, svg, or webp)',
        ];    
    }
}
