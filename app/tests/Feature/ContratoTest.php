<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ContratoTest extends TestCase
{
    /** @test */
    public function verifica_se_cadastro_contrato_salva()
    {
        $numero= random_int(1,9999);
        $dadosImovel = [
            "email" => "teste@accordous.com",
            "rua" => "Rua Teste",
            "numero" =>$numero,
            "complemento" => 'Complemento teste',
            "bairro" => 'Bairro teste',
            "cidade" => 'Cidade teste',
            "estado" => 'MS',
        ];

        $response=$this->json('POST', 'api/imovel', $dadosImovel, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->decodeResponseJson();
        Log::info($response);
        $dadosContrato = [
            "propriedade" => $response['id'],
            "tipo_pessoa" => "F",
            "documento" =>'757.877.923-00',
            "email" => "teste@accordous.com",
            "nome" => 'Nome teste'
        ];
        Log::info($dadosContrato);
        $response2=$this->json('POST', 'api/contrato', $dadosContrato, ['Accept' => 'application/json'])
            ->assertStatus(201)->decodeResponseJson();
        Log::info($response2);
    }
}
