<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::post('login', [AuthController::class, 'login_member']);
Route::post('login', [AuthController::class, 'login_member']);
Route::post('login', [AuthController::class, 'index']);
Route::post('/dashboard', [AuthController::class, 'index']);
