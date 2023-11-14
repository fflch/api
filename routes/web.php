<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;

Route::get('invite', [InvitationsController::class, 'index']);
Route::post('invite', [InvitationsController::class, 'generateInvitation']);

Route::get('register', [RegistrationController::class, 'index']);
Route::post('register', [RegistrationController::class, 'register']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'auth']);