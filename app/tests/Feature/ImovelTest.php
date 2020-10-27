<?php

namespace Tests\Feature;

use App\Model\Imovel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class ImovelTest extends TestCase
{

    /** @test */
    public function listagem_de_imoveis()
    {
        $response = $this->json('GET','/api/imovel');
        $response->assertStatus(200);
    }

    /** @test */
    public function cadastrar_imovel()
    {
        $numero= random_int(1,9999);
        $dados = [
            "email" => "marcoaoc83@gmail.com",
            "rua" => "Rua Teste",
            "numero" =>$numero,
            "complemento" => 'Complemento teste',
            "bairro" => 'Bairro teste',
            "cidade" => 'Cidade teste',
            "estado" => 'MS',
        ];

        $response=$this->json('POST', 'api/imovel', $dados, ['Accept' => 'application/json'])
            ->assertStatus(201)
            ->assertJson([
                'email' => 'marcoaoc83@gmail.com',
                'rua' => 'Rua Teste',
                "numero" =>$numero,
                'complemento' => 'Complemento teste',
                'bairro' => 'Bairro teste',
                'cidade' => 'Cidade teste',
                'estado' => 'MS'
            ])
            ->decodeResponseJson();
    }
}
