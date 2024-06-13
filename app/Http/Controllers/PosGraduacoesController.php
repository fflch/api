<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosGraduacao\PosGraduacoesRequest;
use App\Http\Resources\PosGraduacao\PosGraduacaoResource;
use App\Http\Resources\RecordsCollection;
use App\Http\Services\DataService;

class PosGraduacoesController extends Controller
{
    public function index(PosGraduacoesRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'posgraduacoes';
        $joined = [
            'aluno' => 'pessoas',
            'orientacoes' => 'orientacoes_posgraduacao',
            'convenios' => 'convenios_posgraduacoes',
            'exame_proficiencia' => 'proficiencia_idiomas_pg',
            'bolsas' => 'bolsas_posgraduacao',
            'ocorrencias' => 'ocorrencias_posgraduacao',
            'defesa' => 'defesas_posgraduacao',
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = PosGraduacaoResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
