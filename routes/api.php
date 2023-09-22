<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ICsController;
use App\Http\Controllers\PosDocsController;
use App\Http\Controllers\PesquisadoresColaboradoresController;
use App\Http\Controllers\DefesasController;
use App\Http\Controllers\DocentesController;
use App\Http\Controllers\FuncionariosController;
use App\Http\Controllers\EstagiariosController;
use App\Http\Controllers\CountController;

Route::get('ics', [ICsController::class, 'index']);
Route::get('posdocs', [PosDocsController::class, 'index']);
Route::get('pcs', [PesquisadoresColaboradoresController::class, 'index']);
Route::get('defesas', [DefesasController::class, 'index']);
Route::get('docentes', [DocentesController::class, 'index']);
Route::get('funcionarios', [FuncionariosController::class, 'index']);
Route::get('estagiarios', [EstagiariosController::class, 'index']);

Route::get('/{endpoint}/count', [CountController::class, 'index'])->where('endpoint', '.*');