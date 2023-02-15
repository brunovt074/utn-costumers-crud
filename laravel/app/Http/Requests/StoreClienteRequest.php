<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\Cliente;

class StoreClienteRequest extends FormRequest
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
    public function rules(Cliente $cliente)
    {
        return [
            'cuit' => 'required | digits: 11 | unique:App\Models\Cliente',            
            Rule::unique('App\Models\Cliente')->ignore($cliente->id,'nro_cliente'),
            'nombre'=> 'required | max: 100',
            'apellido'=> 'required | max: 100',
            'telefono' => 'required | max: 25',
            'email'=> 'required | email | max: 150',
            Rule::unique('App\Models\Cliente')->ignore($cliente->id,'nro_cliente'),
        ];
    }
}
