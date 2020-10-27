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
    public function setDocumentoAttribute($value)
    {
        $this->attributes['documento'] = preg_replace("/[^0-9]/", "", $value);
    }
    public function Imovel()
    {
        return $this->hasOne('App\Model\Imovel','propriedade');
    }
}
