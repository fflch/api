<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosGraduacao\DisciplinasPosGraduacaoRequest;
use App\Http\Resources\PosGraduacao\DisciplinaPosGraduacaoCollection;
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

        return new DisciplinaPosGraduacaoCollection($results, $primary, $joined);
    }
}
