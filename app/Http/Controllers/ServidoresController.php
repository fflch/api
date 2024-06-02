<?php

namespace App\Http\Controllers;

use App\Http\Requests\Servidores\DocentesRequest;
use App\Http\Resources\Servidores\DocenteResource;
use App\Http\Requests\Servidores\EstagiariosRequest;
use App\Http\Resources\Servidores\EstagiarioResource;
use App\Http\Requests\Servidores\FuncionariosRequest;
use App\Http\Resources\Servidores\FuncionarioResource;

class ServidoresController extends Controller
{
    public function getFuncionarios(FuncionariosRequest $request)
    {
        $primary = 'funcionarios';
        $joined = [
            'pessoa' => 'pessoas',
            'designacoes' => 'designacoes_servidores'
        ];

        $resourceClass = FuncionarioResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }

    public function getEstagiarios(EstagiariosRequest $request)
    {
        $primary = 'estagiarios';
        $joined = ['pessoa' => 'pessoas'];

        $resourceClass = EstagiarioResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }

    public function getDocentes(DocentesRequest $request)
    {
        $primary = 'docentes';
        $joined = [
            'pessoa' => 'pessoas',
            'designacoes' => 'designacoes_servidores'
        ];

        $resourceClass = DocenteResource::class;
        return $this->getResourceCollection($request, $primary, $joined, $resourceClass);
    }
}
