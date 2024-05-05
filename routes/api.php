<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\EstagiariosController;
use App\Http\Controllers\IcsController;

$controllers = [
    'vinculos/docentes' => DocentesController::class,
    'vinculos/funcionarios' => FuncionariosController::class,
    'vinculos/estagiarios' => EstagiariosController::class,
    'ics' => IcsController::class,
    // 'posdocs' => PosDocsController::class,
    // 'pcs' => PesquisadoresColabController::class,
    // 'defesas' => DefesasController::class,
];

Route::prefix('v1')->group(function () use ($controllers) {
    foreach ($controllers as $route => $controller) {
        Route::get($route, [$controller, 'index']);
    }
});
