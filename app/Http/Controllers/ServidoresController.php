<?php

namespace App\Http\Controllers;

use App\Http\Resources\Servidores\DocenteResource;
use App\Http\Resources\Servidores\EstagiarioResource;
use App\Http\Resources\Servidores\FuncionarioResource;
use App\Models\Pessoas\Pessoa;
use App\Models\Servidores\DesignacaoServidor;
use App\Models\Servidores\Docente;
use App\Models\Servidores\Estagiario;
use App\Models\Servidores\Funcionario;
use Illuminate\Http\Request;

class ServidoresController extends RecordsController
{
    public function getFuncionarios(Request $request)
    {
        $pathToModelMapping = [
            'funcionario' => Funcionario::class,
            'funcionario.pessoa' => Pessoa::class,
            'funcionario.designacoes' => DesignacaoServidor::class,
        ];

        $resourceClass = FuncionarioResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }

    public function getEstagiarios(Request $request)
    {
        $pathToModelMapping = [
            'estagiario' => Estagiario::class,
            'estagiario.pessoa' => Pessoa::class
        ];

        $resourceClass = EstagiarioResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }

    public function getDocentes(Request $request)
    {
        $pathToModelMapping = [
            'docente' => Docente::class,
            'docente.pessoa' => Pessoa::class,
            'docente.designacoes' => DesignacaoServidor::class,
        ];

        $resourceClass = DocenteResource::class;
        return $this->getResourceCollection($request, $pathToModelMapping, $resourceClass);
    }
}
