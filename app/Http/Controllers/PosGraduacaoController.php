<?php

namespace App\Http\Controllers;

use App\Http\Requests\PosGraduacao\DisciplinasPosGraduacaoRequest;
use App\Http\Resources\PosGraduacao\DisciplinaPosGraduacaoResource;
use App\Http\Requests\PosGraduacao\PosGraduacoesRequest;
use App\Http\Resources\PosGraduacao\PosGraduacaoResource;

class PosGraduacaoController extends Controller
{
    public function getPosGraduacoes(PosGraduacoesRequest $request)
    {
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

        $resourceClass = PosGraduacaoResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }

    public function getDisciplinas(DisciplinasPosGraduacaoRequest $request)
    {
        $primary = 'disciplinas_posgraduacao';
        $joined = [
            'turmas' => 'turmas_posgraduacao',
        ];

        $resourceClass = DisciplinaPosGraduacaoResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }
}
