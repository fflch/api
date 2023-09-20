<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ICsController;
use App\Http\Controllers\PosDocsController;
use App\Http\Controllers\CountController;

Route::get('ics', [ICsController::class, 'index']);

Route::get('posdocs', [PosDocsController::class, 'index']);

Route::get('/{endpoint}/count', [CountController::class, 'index'])->where('endpoint', '.*');