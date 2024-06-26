<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveFileRequest extends FormRequest
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
            'fileName'=>'required',
            'file'=>'required',
        ];
    }

    
    

    public function messages(){
        return[
            'fileName.required'=>'El Nombre del archivo es requerido',
            'file.required'=>'Es requerido adjuntar el archivo',
        ];    
    }
}
