<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\TestimoniController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function(){
    Route::post('admin', [AuthController::class, 'login'])->name('login');
    Route::post('register', [AuthController::class, 'register']);

    Route::post('logout', [AuthController::class, 'logout']);
});

Route::group([
    'middleware' => 'api'

    
], function() {
    // Routes for specific order statuses
    Route::get('pesanan/baru', [OrderController::class, 'baru']);
    Route::get('pesanan/dikonfirmasi', [OrderController::class, 'dikonfirmasi']);
    Route::get('pesanan/dikemas', [OrderController::class, 'dikemas']);
    Route::get('pesanan/dikirim', [OrderController::class, 'dikirim']);
    Route::get('pesanan/diterima', [OrderController::class, 'diterima']);
    Route::get('pesanan/selesai', [OrderController::class, 'selesai']);
    
    Route::post('pesanan/ubah_status/{order}', [OrderController::class, 'ubah_status']);

    Route::get('reports', [ReportController::class, 'index']);

    // Resourceful routes for other controllers
    Route::resources([
        'categories' => CategoryController::class,
        'subcategories' => SubCategoryController::class,
        'sliders' => SliderController::class,
        'products' => ProductController::class,
        'members' => MemberController::class,
        'testimonis' => TestimoniController::class,
        'reviews' => ReviewController::class,
        'orders' => OrderController::class,
    ]);
});