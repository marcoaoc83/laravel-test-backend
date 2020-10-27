<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use JamesDordoy\LaravelVueDatatable\Traits\LaravelVueDatatableTrait;

class Imovel extends Model
{
    use LaravelVueDatatableTrait;
    protected $table = 'imovel';
    public $timestamps = false;
    protected $fillable = [
        'email',
        'rua',
        'numero',
        'complemento',
        'bairro',
        'cidade',
        'estado',
        'ativo'
    ];
    protected $appends = ['endereco'];

    public function getEnderecoAttribute()
    {
        return $this->rua . ', ' . $this->numero . ', ' . $this->cidade . ', ' . $this->estado;
    }

    public function Contrato()
    {
        return $this->hasOne('App\Model\Contrato','id','propriedade');
    }

    protected $dataTableColumns = [
        'endereco' => [
            'searchable' => true,
        ],
        'email' => [
            'searchable' => true,
        ]
    ];

    protected $dataTableRelationships = [
        //
    ];
}
