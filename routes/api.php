<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function(){
    Route::post('login', [AuthController::class, 'login'])->name('login');
});


Route::group([
    'middleware' => 'api',
], function() {
    Route::resources([
        CategoryController::class
    ]);
});