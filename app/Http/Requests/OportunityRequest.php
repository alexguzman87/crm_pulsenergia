<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OportunityRequest extends FormRequest
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
            'title'=>'required',
            'contact_name'=>'required',
            'organization'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'country'=>'required',
            'state'=>'required',
            'address'=>'required',
            'city'=>'required',
            'postal_code'=>'required',
            'status'=>'required',
            'type'=>'required',
            'budget'=>'required',
            'probability'=>'required',
            'description'=>'required'
        ];
    }

    public function messages(){
        return[
            'title.required'=>'Debes añadir un título',
            'contact_name.required'=>'Debes añadir un nombre de contacto',
            'organization.required'=>'Debes añadir una organización',
            'email.required'=>'Debes añadir un correo electrónico',
            'phone.required'=>'Debes añadir un teléfono',
            'country.required'=>'Debes añadir un país',
            'state.required'=>'Debes añadir un estado',
            'address.required'=>'Debes añadir una dirección',
            'city.required'=>'Debes añadir una ciudad',
            'postal_code.required'=>'Debes añadir un código postal',
            'status.required'=>'Debes añadir un Status',
            'type.required'=>'Debes añadir un tipo',
            'budget.required'=>'Debes añadir un presupuesto',
            'probability.required'=>'Debes añadir una probabilidad',
            'description.required'=>'Debes añadir una descripción'
        ];    
    }
}
