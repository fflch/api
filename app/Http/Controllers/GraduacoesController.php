<?php

namespace App\Http\Controllers;

use App\Http\Requests\Graduacao\GraduacoesRequest;
use App\Http\Resources\Graduacao\GraduacaoResource;
use App\Http\Resources\RecordsCollection;
use App\Http\Services\DataService;

class GraduacoesController extends Controller
{
    public function index(GraduacoesRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'graduacoes';
        $joined = [
            'aluno' => 'pessoas',
            'habilitacoes' => 'habilitacoes',
            'trancamentos' => 'trancamentos_graduacao',
            'notas_ingresso' => 'notas_ingresso_graduacao',
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = GraduacaoResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
