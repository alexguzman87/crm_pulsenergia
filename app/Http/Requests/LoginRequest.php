<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Factory as ValidationFactory;

class LoginRequest extends FormRequest
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
            'username'=>'required',
            'password'=> 'required',
            //'g-recaptcha-response' => 'required|captcha'// esto sólo aplica para el servidor
        ];
    }

    public function messages(){
        return[
            'username.required'=>'El nombre de usuario o email es requerido',
            'password.required'=>'La contraseña es requerida',
            //'g-recaptcha-response.required' => 'La Validación es requerida',//esto sólo aplica para el servidor
            //'g-recaptcha-response.captcha' => 'La Validación es requerida'//esto sólo aplica para el servidor
        ];
    }

    public function getCredentials(){

        $username=$this->get('username');

        if($this->isEmail($username)){
            return[
                'email'=>$username,
                'password'=>$this->get('password')
            ];
        }

        return $this->only('username','password');  
    }

    public function isEmail($value){
        $factory=$this->container->make(ValidationFactory::class);
        return !$factory->make(['username'=>$value],['username'=>'email'])->fails();  
    }
}
