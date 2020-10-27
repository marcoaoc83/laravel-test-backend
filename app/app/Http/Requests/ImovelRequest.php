<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
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
            'email'     => 'required|max:250|email',
            'rua'       => 'required|max:250',
            'bairro'    => 'required|max:250',
            'cidade'    => 'required|max:250',
            'estado'    => 'required|max:250',
        ];
    }

    public function messages($id = '')
    {
        return [
            'email.required'        =>'Email é obrigatório',
            'email.email'           =>'Email inválido',
            'email.max'             =>'Máximo 250 caracteres',

            'rua.required'          =>'Rua é obrigatório',
            'rua.max'               =>'Máximo 250 caracteres',

            'bairro.required'       =>'Bairro é obrigatório',
            'bairro.max'            =>'Máximo 250 caracteres',

            'cidade.required'       =>'Cidade é obrigatório',
            'cidade.max'            =>'Máximo 250 caracteres',

            'estado.required'       =>'Estado é obrigatório',
            'estado.max'            =>'Máximo 250 caracteres',


        ];
    }
}
