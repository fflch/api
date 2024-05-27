<?php

namespace App\Http\Controllers;

use App\Http\Requests\GraduacoesRequest;
use App\Http\Resources\GraduacaoCollection;
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

        return new GraduacaoCollection($results, $primary, $joined);
    }
}
