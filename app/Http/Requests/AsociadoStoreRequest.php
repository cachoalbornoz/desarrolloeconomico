<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsociadoStoreRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

            'apellido'     => 'required|string|max:255',
            'nombre'       => 'required|string|max:255',
            'dni'          => 'required|string|min:7|max:10|unique:users',
            'nacionalidad' => 'required',
            'direccion'    => 'required|string|max:255',
            'ciudad'       => 'required',
            'codarea'      => 'required',
            'telefono'     => 'required',
            'fechanac'     => 'required|date',
            'email'        => 'required|string|email|max:255|unique:users',
            'password'     => 'required|string|min:8|confirmed',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
