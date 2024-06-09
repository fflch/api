<?php

namespace App\Http\Controllers;

use App\Http\Resources\Graduacao\DisciplinaGraduacaoResource;
use App\Http\Resources\Graduacao\GraduacaoResource;
use App\Models\Graduacao\DisciplinaGraduacao;
use App\Models\Graduacao\Graduacao;
use App\Models\Graduacao\Habilitacao;
use App\Models\Graduacao\NotaIngressoGraduacao;
use App\Models\Graduacao\TrancamentoGraduacao;
use App\Models\Graduacao\TurmaGraduacao;
use App\Models\Pessoas\Pessoa;
use Illuminate\Http\Request;

class GraduacaoController extends RecordsController
{
    public function getGraduacoes(Request $request)
    {
        $pathToModelMapping = [
            'graduacao' => Graduacao::class,
            'graduacao.aluno' => Pessoa::class,
            'graduacao.habilitacoes' => Habilitacao::class,
            'graduacao.trancamentos' => TrancamentoGraduacao::class,
            'graduacao.notas_ingresso' => NotaIngressoGraduacao::class,
        ];

        $resourceClass = GraduacaoResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }

    public function getDisciplinas(Request $request)
    {
        $pathToModelMapping = [
            'disciplina_gr' => DisciplinaGraduacao::class,
            'disciplina_gr.turmas' => TurmaGraduacao::class,
        ];

        $resourceClass = DisciplinaGraduacaoResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }
}
