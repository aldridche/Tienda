<?php

namespace App\Http\Requests\Producto;

use Illuminate\Foundation\Http\FormRequest;

class ProductoCreateRequest extends FormRequest
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
            //
            'producto' => 'required|min:3|unique:productos,producto',
            'disponibles' => 'required',
            'precioUnitario'=> 'required',
            'iva' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'producto.required'=> 'El nombre es requerido',
            'producto.min'=> 'El producto debe tener un minimo de 3 letras',
            'producto.unique'=> 'El producto ya existe',
            'disponibles.required'=> 'Este campo es requerido',
            'apellido.required'=> 'El campo disponibles es requerido',
            'iva.required'=> 'El iva es requerida',
            'precioUnitario.required' => 'El precio unitario es obligatorio',
        ];
    }
}
