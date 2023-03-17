<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IniciacoesController;

Route::get('iniciacoes', [IniciacoesController::class, 'index']);
