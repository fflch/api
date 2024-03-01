<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationsController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AuthController;

Route::get('/', function () {
    return response()->file(public_path('docs/public_docs.html'));
});

Route::get('/public', function () {
    return redirect('/');
});

Route::get('invite', [InvitationsController::class, 'index']);
Route::post('invite', [InvitationsController::class, 'generateInvitation']);

Route::get('register', [RegistrationController::class, 'index']);
Route::post('register', [RegistrationController::class, 'register']);

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'auth']);