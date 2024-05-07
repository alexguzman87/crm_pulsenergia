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
            'password'=>'required',
        ];
    }

    public function messages(){
        return[
            'password.required'=>'La Contraseña es requerida',
            //'identification_number.numeric'=>'El Número de Identificación sólo debe tener caracteres numéricos',
            //'identification_number.unique'=>'El Número de Identificación ya está siendo usado',
            //'email.required'=>'El Correo Electrónico es requerido',
            //'email.unique'=>'El Correo Electrónico ya está siendo usado',
            //'phone'=>'El Teléfono es requerido',
            /*'birth_date.before'=>'La Fecha de Nacimiento debe tener un formato válido',
            'name.required'=>'El Nombre es requerido',
            'name.regex'=>'El Nombre sólo debe tener letras',
            'lastname.required'=>'El Apellido es requerido',
            'lastname.regex'=>'El Apellido sólo debe tener letras',
            'phone_number.required'=>'El Teléfono es requerido',
            'phone_number.numeric'=>'El Teléfono solo debe tener números',
            'phone_number.digits_between'=>'El Teléfono debe ser mayor a 8 números y menor a 20 números',
            'address.required'=>'La Dirección es requerida',
            //'image.required'=>'La Imagen es requerida',
            //'image.image'=>'La Imagen sólo debe tener formatos (jpg, jpeg, png, bmp, gif, svg, or webp)',*/
        ];    
    }
}
