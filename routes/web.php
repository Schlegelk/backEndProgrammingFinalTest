<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [AuthController::class, 'login_member']);
<<<<<<< HEAD
Route::post('logout', [AuthController::class, 'login_member']);

Route::get('login', [AuthController::class, 'index']);
Route::get('/dashboard', [DashboardController::class, 'index']);
=======
Route::post('logout', [AuthController::class, 'logout_member']);
>>>>>>> origin
