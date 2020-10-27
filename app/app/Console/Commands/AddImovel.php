<?php

namespace App\Console\Commands;

use App\Model\Imovel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class AddImovel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'addimovel:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $numero= random_int(1,9999);
        $dados = [
            "email" => "cronjob@accordous.com",
            "rua" => "Rua Cronjob - ".Carbon::now()->format('d/m/Y H:i:s'),
            "numero" =>$numero,
            "complemento" => 'Complemento Cronjob',
            "bairro" => 'Bairro Cronjob',
            "cidade" => 'Cidade Cronjob',
            "estado" => 'MS',
        ];
        Imovel::create($dados);
    }
}
