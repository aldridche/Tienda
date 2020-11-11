<?php

namespace App\Http\Requests\Ventas;

use Illuminate\Foundation\Http\FormRequest;

class VentasCreateRequest extends FormRequest
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
            'fecha' => 'required',
            'productos_id' => 'required|not_in:0',
            'clientes_id' => 'required|not_in:0',
        ];
    }

    public function messages()
    {
        return [
            'fecha.required'=> 'La fecha es requerida',
            'productos_id.not_in' => 'El campo producto es obligatorio',
            'clientes_id.required' => 'El campo clientes es obligatorio',
        ];
    }
}
