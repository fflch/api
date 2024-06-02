<?php

namespace App\Http\Controllers;

use App\Http\Requests\Graduacao\DisciplinasGraduacaoRequest;
use App\Http\Resources\Graduacao\DisciplinaGraduacaoResource;
use App\Http\Requests\Graduacao\GraduacoesRequest;
use App\Http\Resources\Graduacao\GraduacaoResource;

class GraduacaoController extends Controller
{
    public function getGraduacoes(GraduacoesRequest $request)
    {
        $primary = 'graduacoes';
        $joined = [
            'aluno' => 'pessoas',
            'habilitacoes' => 'habilitacoes',
            'trancamentos' => 'trancamentos_graduacao',
            'notas_ingresso' => 'notas_ingresso_graduacao',
        ];

        $resourceClass = GraduacaoResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }

    public function getDisciplinas(DisciplinasGraduacaoRequest $request)
    {
        $primary = 'disciplinas_graduacao';
        $joined = [
            'turmas' => 'turmas_graduacao',
        ];

        $resourceClass = DisciplinaGraduacaoResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }
}
