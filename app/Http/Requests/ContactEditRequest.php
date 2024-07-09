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
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required|numeric|digits_between:8,20',
            'country'=>'required',
            'state'=>'required',
            'address'=>'required',
            'city'=>'required',
            'postal_code'=>'required',
            'id_origins'=>'required',
            'id_type'=>'required',
            'id_level'=>'required'
        ];
    }

    public function messages(){
        return[
            'name.required'=>'El Nombre es requerido',
            'email.required'=>'El Correo Electrónico es requerido',
            'email.email'=>'El Correo Electrónico debe tener formato xxxx@xxx.xxx',
            'phone'=>'El Teléfono es requerido',
            'phone.numeric'=>'El Teléfono solo debe tener números',
            'phone.digits_between'=>'El Teléfono debe ser mayor a 8 números y menor a 20 números',
            'country.required'=>'El País es requerido',
            'state.required'=>'El Estado o Región es requerida',
            'address.required'=>'La Direcció es requerida',
            'city.required'=>'La Ciudad es requerida',
            'postalCode.required'=>'El Código Postal es requerido',
            'id_origins.required'=>'El Origen del Lead es requerido',
            'id_level.required'=>'El Nivel del Lead es requerido',
            'id_type.required'=>'El Tipo del Lead es requerido',
        ];    
    }
}
