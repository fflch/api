<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ICsController;
use App\Http\Controllers\PosDocsController;
use App\Http\Controllers\PesquisadoresColabController;
use App\Http\Controllers\DefesasController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\EstagiariosController;
use App\Http\Controllers\CountController;

$controllers = [
    'ics' => ICsController::class,
    'posdocs' => PosDocsController::class,
    'pcs' => PesquisadoresColabController::class,
    'defesas' => DefesasController::class,
    'vinculos/docentes' => DocentesController::class,
    'vinculos/funcionarios' => FuncionariosController::class,
    'vinculos/estagiarios' => EstagiariosController::class,
];

foreach ($controllers as $route => $controller) {
    Route::prefix('public')->get($route, [$controller, 'public']);
    Route::middleware('auth:sanctum')->prefix('private')->get($route, [$controller, 'private']);
}

Route::prefix('public')->group(function () {
    Route::get('/{endpoint}/count', [CountController::class, 'public'])->where('endpoint', '.*');
});

Route::middleware('auth:sanctum')->prefix('private')->group(function () {
    Route::get('/{endpoint}/count', [CountController::class, 'private'])->where('endpoint', '.*');
});
