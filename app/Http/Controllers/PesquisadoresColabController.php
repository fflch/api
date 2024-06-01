<?php

namespace App\Http\Controllers;

use App\Http\Requests\PesquisasAvancadas\PesquisadoresColabRequest;
use App\Http\Resources\PesquisasAvancadas\PesquisadorColabResource;
use App\Http\Resources\RecordsCollection;
use App\Http\Services\DataService;

class PesquisadoresColabController extends Controller
{
    public function index(PesquisadoresColabRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'pesquisadores_colab';
        $joined = [
            'pesquisador' => 'pessoas',
            'periodos' => 'periodos_pesquisa_avancada',
            'bolsas' => 'bolsas_pesq_avancada',
            'afastamentosEmpresa' => 'afastamentos_empresa_pesquisa_avancada',
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = PesquisadorColabResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
