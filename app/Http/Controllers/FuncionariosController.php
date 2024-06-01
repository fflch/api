<?php

namespace App\Http\Controllers;

use App\Http\Requests\Servidores\FuncionariosRequest;
use App\Http\Resources\RecordsCollection;
use App\Http\Resources\Servidores\FuncionarioResource;
use App\Http\Services\DataService;

class FuncionariosController extends Controller
{
    public function index(FuncionariosRequest $request)
    {
        $validatedRequest = $request->validated();

        $primary = 'funcionarios';
        $joined = [
            'pessoa' => 'pessoas',
            'designacoes' => 'designacoes_servidores'
        ];

        $results = (new DataService)->getFilteredData(
            $primary,
            $joined,
            $validatedRequest
        );

        $resourceClass = FuncionarioResource::class;
        return new RecordsCollection($results, $primary, $joined, $resourceClass);
    }
}
