<?php

namespace App\Http\Controllers;

use App\Http\Requests\FuncionariosRequest;
use App\Http\Resources\FuncionarioCollection;
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

        return new FuncionarioCollection($results, $primary, $joined);
    }
}
