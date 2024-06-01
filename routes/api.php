<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursosCCEXController;
use App\Http\Controllers\DisciplinasGraduacaoController;
use App\Http\Controllers\DisciplinasPosGraduacaoController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\EstagiariosController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\GraduacoesController;
use App\Http\Controllers\IcsController;
use App\Http\Controllers\PesquisadoresColabController;
use App\Http\Controllers\PosDocsController;
use App\Http\Controllers\PosGraduacoesController;
use App\Http\Controllers\SiicuspController;

$controllers = [
    'vinculos/docentes' => DocentesController::class,
    'vinculos/funcionarios' => FuncionariosController::class,
    'vinculos/estagiarios' => EstagiariosController::class,
    'ics' => IcsController::class,
    'pesquisas-avancadas/posdocs' => PosDocsController::class,
    'pesquisas-avancadas/pesquisadores-colaboradores' => PesquisadoresColabController::class,
    'posgraduacoes' => PosGraduacoesController::class,
    'graduacoes' => GraduacoesController::class,
    'siicusp' => SiicuspController::class,
    'disciplinas-posgraduacao' => DisciplinasPosGraduacaoController::class,
    'disciplinas-graduacao' => DisciplinasGraduacaoController::class,
    'cursos-ccex' => CursosCCEXController::class,
];

Route::prefix('v1')->group(function () use ($controllers) {
    foreach ($controllers as $route => $controller) {
        Route::get($route, [$controller, 'index']);
    }
});
