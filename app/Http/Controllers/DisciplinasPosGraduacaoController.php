<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosGraduacao\DisciplinasPosGraduacaoRequest;
use App\Http\Resources\PosGraduacao\DisciplinaPosGraduacaoResource;
use App\Http\Resources\RecordsCollection;
use App\Http\Services\DataService;

class DisciplinasPosGraduacaoController extends Controller
{
    public function index(DisciplinasPosGraduacaoRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'disciplinas_posgraduacao';
        $joined = [
            'turmas' => 'turmas_posgraduacao',
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = DisciplinaPosGraduacaoResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
