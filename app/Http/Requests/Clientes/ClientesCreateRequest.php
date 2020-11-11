<?php

namespace App\Http\Requests\Clientes;

use Illuminate\Foundation\Http\FormRequest;

class ClientesCreateRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3,nombre,',
            'apellido' => 'required|min:3,',
            'edad'=> 'required',
            'RFC' => 'required|min:5,',
            'domicilio' => 'required|min:10',
        ];
    }
    public function messages()
    {
        return [
            'nombre.required'=> 'El nombre es requerido',
            'nombre.min'=> 'El nombre debe tener un minimo de 3 letras',
            'apellido.required'=> 'El apellido es requerido',
            'apellido.min'=> 'El apellido debe tener un minimo de 3 letras',
            'edad.required'=> 'La edad es requerida',
            'RFC.required'=> 'El RFC es requerido',
            'RFC.min'=> 'El RFC debe tener un minimo de 5 letras',
            'domicilio.required' => 'El campo domicilio es obligatorio',
            'domicilio.min'=> 'El domicilio debe tener un minimo de 5 letras',
        ];
    }
}
