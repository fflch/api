<?php

namespace App\Http\Controllers;

use App\Http\Resources\IniciacaoCientifica\IcResource;
use App\Http\Resources\IniciacaoCientifica\SiicuspResource;
use App\Models\IniciacaoCientifica\BolsaIc;
use App\Models\IniciacaoCientifica\Ic;
use App\Models\IniciacaoCientifica\ParticipanteSiicusp;
use App\Models\IniciacaoCientifica\TrabalhoSiicusp;
use App\Models\Pessoas\Pessoa;
use Illuminate\Http\Request;

class IniciacaoCientificaController extends RecordsController
{
    public function getProjetos(Request $request)
    {
        $pathToModelMapping = [
            'ic' => Ic::class,
            'ic.aluno' => Pessoa::class,
            'ic.orientador' => Pessoa::class,
            'ic.bolsas' => BolsaIc::class,
        ];

        $resourceClass = IcResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }

    public function getTrabalhosSiicusp(Request $request)
    {
        $pathToModelMapping = [
            'trabalho_siicusp' => TrabalhoSiicusp::class,
            'trabalho_siicusp.participantes' => ParticipanteSiicusp::class,
        ];

        $resourceClass = SiicuspResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }
}
