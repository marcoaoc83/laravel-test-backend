<?php

namespace Tests\Unit;

use App\Model\Imovel;
use PHPUnit\Framework\TestCase;

class ImovelTest extends TestCase
{
    /** @test */
    public function check_se_colunas_imoveis_esta_correto()
    {
        $imovel=New Imovel();

        $campos=[
            'email',
            'rua',
            'numero',
            'complementos',
            'bairro',
            'cidade',
            'estado',
            'ativo'
        ];

        $arrayComparacao=array_diff($campos,$imovel->getFillable());

        $this->assertEquals(0,count($arrayComparacao));

    }
    /** @test */
    public function listagem_de_imoveis()
    {
        $this->assertTrue(true);
    }
}
