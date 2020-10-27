<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratoRequest extends FormRequest
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
        if($this->tipo_pessoa)
            $vDocumento=$this->tipo_pessoa=='F'? 'required|cpf|max:50' : 'required|cnpj|max:50';
        else $vDocumento ='required|max:50';
        return [
            'email'         => 'required|max:250|email',
            'nome'          => 'required|max:250',
            'documento'     => $vDocumento,
            'tipo_pessoa'   => 'required|max:1',
            'propriedade'   => 'required|exists:imovel,id|unique:contrato,propriedade',
        ];
    }

    public function messages($id = '')
    {
        return [
            'email.required'                =>'Email é obrigatório',
            'email.email'                   =>'Email inválido',
            'email.max'                     =>'Máximo 250 caracteres',

            'nome.required'                 =>'Nome é obrigatório',
            'nome.max'                      =>'Máximo 250 caracteres',

            'documento.required'            =>'Documento  é obrigatório',
            'documento.cpf'                 =>'CPF inválido',
            'documento.cnpj'                =>'CNPJ inválido',
            'documento.max'                 =>'Máximo 50 caracteres',

            'tipo_pessoa.required'          =>'Tipo é obrigatório',
            'tipo_pessoa.max'               =>'Máximo 1 caracteres',

            'propriedade.required'          =>'Propriedade é obrigatório',
            'propriedade.unique'            =>'Imóvel já contratado',
            'propriedade.exists'            =>'Imóvel não existe',
        ];
    }
}
