<?php

namespace App\Http\Controllers;

use App\Http\Requests\IniciacaoCientifica\IcsRequest;
use App\Http\Resources\IniciacaoCientifica\IcResource;
use App\Http\Requests\IniciacaoCientifica\SiicuspRequest;
use App\Http\Resources\IniciacaoCientifica\SiicuspResource;

class IniciacaoCientificaController extends Controller
{
    public function getProjetos(IcsRequest $request)
    {
        $primary = 'ics';
        $joined = [
            'aluno' => 'pessoas',
            'orientador' => 'pessoas',
            'bolsas' => 'bolsas_ic'
        ];

        $resourceClass = IcResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }

    public function getTrabalhosSiicusp(SiicuspRequest $request)
    {
        $primary = 'trabalhos_siicusp';
        $joined = [
            'participantes' => 'participantes_siicusp',
        ];

        $resourceClass = SiicuspResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }
}
