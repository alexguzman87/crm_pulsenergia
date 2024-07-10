<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskEditRequest extends FormRequest
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
            'task'=>'required',
            'id_user'=>'required',
            'priority'=>'required',
            'status'=>'required',
            'done_date'=>'required|after_or_equal:today'
        ];
    }

    public function messages(){
        return[
            'task.required'=>'El Nombre de la Tarea es requerido',
            'id_user.required'=>'El Responsable es requerido',
            'priority.required'=>'La Prioridad es requerida',
            'status.required'=>'El Estado es requerido',
            'done_date.required'=>'La fecha de Finalización es requerida',
            'done_date.after_or_equal:today'=>'La fecha de Finalización debe ser mayor al día de hoy',
        ]; 
    }
}
