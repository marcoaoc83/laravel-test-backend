<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ImovelResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //Aqui faz a formatação do retorno ou no Model
        return [
            'email'=>$this->email,
            'rua'=>$this->rua,
            'numero'=>$this->numero,
            'complemento'=>$this->complemento,
            'bairro'=>$this->bairro,
            'cidade'=>$this->cidade,
            'estado'=>$this->estado
        ];
        //return parent::toArray($request);
    }
}
