<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\EstagiariosController;
use App\Http\Controllers\IcsController;
use App\Http\Controllers\PosDocsController;
use App\Http\Controllers\PesquisadoresColabController;

$controllers = [
    'vinculos/docentes' => DocentesController::class,
    'vinculos/funcionarios' => FuncionariosController::class,
    'vinculos/estagiarios' => EstagiariosController::class,
    'ics' => IcsController::class,
    'pesquisas-avancadas/posdocs' => PosDocsController::class,
    'pesquisas-avancadas/pesquisadores-colaboradores' => PesquisadoresColabController::class,
];

Route::prefix('v1')->group(function () use ($controllers) {
    foreach ($controllers as $route => $controller) {
        Route::get($route, [$controller, 'index']);
    }
});
