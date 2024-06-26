<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactEditRequest extends FormRequest
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
            'name'=>'required|alpha:ascii',
            'email'=>'required|email',
            'phone'=>'required|numeric|digits_between:8,20',
            'id_origins'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'El Nombre es requerido',
            'name.alpha'=>'El Nombre sólo debe tener letras',
            'email.required'=>'El Correo Electrónico es requerido',
            'email.email'=>'El Correo Electrónico debe tener formato xxxx@xxx.xxx',
            'phone'=>'El Teléfono es requerido',
            'phone.numeric'=>'El Teléfono solo debe tener números',
            'phone.digits_between'=>'El Teléfono debe ser mayor a 8 números y menor a 20 números',
            'id_origins.required'=>'El Origen es requerido',
        ];    
    }
}
