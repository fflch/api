<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesquisasAvancadas\PesquisadoresColabRequest;
use App\Http\Resources\PesquisasAvancadas\PesquisadorColabResource;
use App\Http\Requests\PesquisasAvancadas\PosDocsRequest;
use App\Http\Resources\PesquisasAvancadas\PosDocResource;

class PesquisasAvancadasController extends Controller
{
    public function getPosDocs(PosDocsRequest $request)
    {
        $primary = 'posdocs';
        $joined = [
            'pesquisador' => 'pessoas',
            'supervisoes' => 'supervisoes_posdoc',
            'periodos' => 'periodos_pesquisa_avancada',
            'bolsas' => 'bolsas_pesq_avancada',
            'afastamentosEmpresa' => 'afastamentos_empresa_pesquisa_avancada',
        ];

        $resourceClass = PosDocResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }

    public function getPesquisadoresColab(PesquisadoresColabRequest $request)
    {
        $primary = 'pesquisadores_colab';
        $joined = [
            'pesquisador' => 'pessoas',
            'periodos' => 'periodos_pesquisa_avancada',
            'bolsas' => 'bolsas_pesq_avancada',
            'afastamentosEmpresa' => 'afastamentos_empresa_pesquisa_avancada',
        ];

        $resourceClass = PesquisadorColabResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }
}
