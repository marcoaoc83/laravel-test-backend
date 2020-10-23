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
        'estado'
    ];



    protected $dataTableColumns = [
        'id' => [
            'searchable' => false,
        ],
        'rua' => [
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
