<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Contrato extends Model
{
    protected $table = 'contrato';
    public $timestamps = false;
    protected $fillable = [
        'propriedade',
        'tipo_pessoa',
        'documento',
        'email',
        'nome'
    ];

    public function Imovel()
    {
        return $this->hasOne('App\Model\Imovel','propriedade');
    }
}
