<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CCExController;
use App\Http\Controllers\GraduacaoController;
use App\Http\Controllers\IniciacaoCientificaController;
use App\Http\Controllers\PesquisasAvancadasController;
use App\Http\Controllers\PosGraduacaoController;
use App\Http\Controllers\ServidoresController;

$endpointMappings = [
    // Graduação
    'graduacao/graduacoes' => [GraduacaoController::class, 'getGraduacoes'],
    'graduacao/disciplinas' => [GraduacaoController::class, 'getDisciplinas'],

    // Iniciação Científica
    'iniciacao-cientifica/projetos' => [IniciacaoCientificaController::class, 'getProjetos'],
    'iniciacao-cientifica/siicusp-trabalhos' => [IniciacaoCientificaController::class, 'getTrabalhosSiicusp'],

    // Pos-Graduação
    'posgraduacao/posgraduacoes' => [PosGraduacaoController::class, 'getPosGraduacoes'],
    'posgraduacao/disciplinas' => [PosGraduacaoController::class, 'getDisciplinas'],

    // Pesquisas Avançadas
    'pesquisas-avancadas/posdocs' => [PesquisasAvancadasController::class, 'getPosDocs'],
    'pesquisas-avancadas/pesquisadores-colaboradores' => [PesquisasAvancadasController::class, 'getPesquisadoresColab'],

    // Servidores
    'servidores/docentes' => [ServidoresController::class, 'getDocentes'],
    'servidores/funcionarios' => [ServidoresController::class, 'getFuncionarios'],
    'servidores/estagiarios' => [ServidoresController::class, 'getEstagiarios'],

    // Cultura e Extensão
    'ccex/cursos' => [CCExController::class, 'getCursos'],
];

Route::prefix('v1')->group(function () use ($endpointMappings) {
    foreach ($endpointMappings as $endpoint => $controllerAction) {
        list($controller, $action) = $controllerAction;
        Route::get($endpoint, [$controller, $action]);
    }
});
