<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'email'=>'required|email|unique:App\Models\Contact,email',
            'id_origins'=>'required',
            'id_type'=>'required',
            'id_level'=>'required',
        ];
    }

    public function messages(){
        return[
            'name.required'=>'El Nombre es requerido',
            'email.required'=>'El Correo Electrónico es requerido',
            'email.email'=>'El Correo Electrónico debe tener formato xxxx@xxx.xxx',
            'email.unique'=>'El Correo Electrónico ya está siendo usado',
            'phone'=>'El Teléfono es requerido',
            'phone.numeric'=>'El Teléfono solo debe tener números',
            'country.required'=>'El País es requerido',
            'state.required'=>'El Estado o Región es requerida',
            'address.required'=>'La Direcció es requerida',
            'city.required'=>'La Ciudad es requerida',
            'postal_code.required'=>'El Código Postal es requerido',
            'id_origins.required'=>'El Origen del Lead es requerido',
            'id_level.required'=>'El Nivel del Lead es requerido',
            'id_type.required'=>'El Tipo del Lead es requerido',
        ];    
    }

}
