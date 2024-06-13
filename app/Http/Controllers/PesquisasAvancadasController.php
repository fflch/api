<?php

namespace App\Http\Controllers;

use App\Http\Resources\PesquisasAvancadas\PesquisadorColabResource;
use App\Http\Resources\PesquisasAvancadas\PosDocResource;
use App\Models\PesquisasAvancadas\AfastamentoEmpresaPesquisaAvancada;
use App\Models\PesquisasAvancadas\BolsaPesquisaAvancada;
use App\Models\PesquisasAvancadas\PeriodoPesquisaAvancada;
use App\Models\PesquisasAvancadas\PesquisadorColab;
use App\Models\PesquisasAvancadas\PosDoc;
use App\Models\PesquisasAvancadas\SupervisaoPosDoc;
use App\Models\Pessoas\Pessoa;
use Illuminate\Http\Request;

class PesquisasAvancadasController extends RecordsController
{
    public function getPosDocs(Request $request)
    {
        $pathToModelMapping = [
            'posdoc' => PosDoc::class,
            'posdoc.pesquisador' => Pessoa::class,
            'posdoc.supervisoes' => SupervisaoPosDoc::class,
            'posdoc.supervisoes.supervisor' => Pessoa::class,
            'posdoc.periodos' => PeriodoPesquisaAvancada::class,
            'posdoc.bolsas' => BolsaPesquisaAvancada::class,
            'posdoc.afastamentosEmpresa' => AfastamentoEmpresaPesquisaAvancada::class,
        ];

        $resourceClass = PosDocResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }

    public function getPesquisadoresColab(Request $request)
    {
        $pathToModelMapping = [
            'pesquisador_colab' => PesquisadorColab::class,
            'pesquisador_colab.pesquisador' => Pessoa::class,
            'pesquisador_colab.periodos' => PeriodoPesquisaAvancada::class,
            'pesquisador_colab.bolsas' => BolsaPesquisaAvancada::class,
            'pesquisador_colab.afastamentosEmpresa' => AfastamentoEmpresaPesquisaAvancada::class,
        ];

        $resourceClass = PesquisadorColabResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }
}
