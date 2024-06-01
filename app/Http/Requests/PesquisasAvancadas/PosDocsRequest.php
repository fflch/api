<?php

namespace App\Http\Requests\PesquisasAvancadas;

use App\Http\Requests\BaseDataRequest;

class PosDocsRequest extends BaseDataRequest
{
    public function __construct()
    {
        $primary = 'posdocs';
        $joined = [
            'pesquisador' => 'pessoas',
            'supervisoes' => 'supervisoes_posdoc',
            'periodos' => 'periodos_pesquisa_avancada',
            'bolsas' => 'bolsas_pesq_avancada',
            'afastamentosEmpresa' => 'afastamentos_empresa_pesquisa_avancada',
        ];

        parent::__construct($primary, $joined);
    }
}
