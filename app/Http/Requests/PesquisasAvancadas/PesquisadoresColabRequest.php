<?php

namespace App\Http\Requests\PesquisasAvancadas;

use App\Http\Requests\BaseDataRequest;

class PesquisadoresColabRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'pesquisadores_colab';
        $joined = [
            'pesquisador' => 'pessoas',
            'periodos' => 'periodos_pesquisa_avancada',
            'bolsas' => 'bolsas_pesq_avancada',
            'afastamentosEmpresa' => 'afastamentos_empresa_pesquisa_avancada',
        ];

        parent::__construct($primary, $joined);
    }
}
