<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;

Route::redirect('/', '/docs');

Route::get('convidar', [InvitationController::class, 'index']);
Route::post('convidar', [InvitationController::class, 'generateInvitation']);

Route::get('cadastrar', [RegistrationController::class, 'index']);
Route::post('cadastrar', [RegistrationController::class, 'register']);

Route::get('token', [AuthController::class, 'index'])->name('token');
Route::post('token', [AuthController::class, 'auth']);
