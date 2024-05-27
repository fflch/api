<?php

namespace App\Http\Controllers;

use App\Http\Requests\DisciplinasGraduacaoRequest;
use App\Http\Resources\DisciplinaGraduacaoCollection;
use App\Http\Services\DataService;

class DisciplinasGraduacaoController extends Controller
{
    public function index(DisciplinasGraduacaoRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'disciplinas_graduacao';
        $joined = [
            'turmas' => 'turmas_graduacao',
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        return new DisciplinaGraduacaoCollection($results, $primary, $joined);
    }
}
