<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesquisasAvancadas\PosDocsRequest;
use App\Http\Resources\PesquisasAvancadas\PosDocResource;
use App\Http\Resources\RecordsCollection;
use App\Http\Services\DataService;

class PosDocsController extends Controller
{
    public function index(PosDocsRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'posdocs';
        $joined = [
            'pesquisador' => 'pessoas',
            'supervisoes' => 'supervisoes_posdoc',
            'periodos' => 'periodos_pesquisa_avancada',
            'bolsas' => 'bolsas_pesq_avancada',
            'afastamentosEmpresa' => 'afastamentos_empresa_pesquisa_avancada',
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = PosDocResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
