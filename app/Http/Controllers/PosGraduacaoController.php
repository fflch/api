<?php

namespace App\Http\Controllers;

use App\Http\Resources\PosGraduacao\DisciplinaPosGraduacaoResource;
use App\Http\Resources\PosGraduacao\PosGraduacaoResource;
use App\Models\Pessoas\Pessoa;
use App\Models\PosGraduacao\BolsaPosGraduacao;
use App\Models\PosGraduacao\ConvenioPosGraduacao;
use App\Models\PosGraduacao\DefesaPosGraduacao;
use App\Models\PosGraduacao\DisciplinaPosGraduacao;
use App\Models\PosGraduacao\OcorrenciaPosGraduacao;
use App\Models\PosGraduacao\OrientacaoPosGraduacao;
use App\Models\PosGraduacao\PosGraduacao;
use App\Models\PosGraduacao\ProficienciaPosGraduacao;
use App\Models\PosGraduacao\TurmaPosGraduacao;
use Illuminate\Http\Request;

class PosGraduacaoController extends RecordsController
{
    public function getPosGraduacoes(Request $request)
    {
        $pathToModelMapping = [
            'posgraduacao' => PosGraduacao::class,
            'posgraduacao.aluno' => Pessoa::class,
            'posgraduacao.orientacoes' => OrientacaoPosGraduacao::class,
            'posgraduacao.orientacoes.orientador' => Pessoa::class,
            'posgraduacao.convenios' => ConvenioPosGraduacao::class,
            'posgraduacao.exame_proficiencia' => ProficienciaPosGraduacao::class,
            'posgraduacao.bolsas' => BolsaPosGraduacao::class,
            'posgraduacao.ocorrencias' => OcorrenciaPosGraduacao::class,
            'posgraduacao.defesa' => DefesaPosGraduacao::class,
        ];

        $resourceClass = PosGraduacaoResource::class;
        return $this->getResourceCollection(
            $request,
            $pathToModelMapping,
            $resourceClass
        );
    }

    public function getDisciplinas(Request $request)
    {
        $pathToModelMapping = [
            'disciplina_pg' => DisciplinaPosGraduacao::class,
            'disciplina_pg.turmas' => TurmaPosGraduacao::class,
        ];

        $resourceClass = DisciplinaPosGraduacaoResource::class;
        return $this->getResourceCollection(
            $request,
            $pathToModelMapping,
            $resourceClass
        );
    }
}
