<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SliderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TestimoniController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SubcategoryController;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

//auth
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login']);
Route::get('logout', [AuthController::class, 'logout']);

//Kategori
Route::get('/kategori', [CategoryController::class, 'list']);
Route::get('/subkategori', [SubcategoryController::class, 'list']);
Route::get('/slider', [SliderController::class, 'list']);
Route::get('/barang', [ProductController::class, 'list']);
Route::get('/testimoni', [TestimoniController::class, 'list']);
Route::get('/review', [ReviewController::class, 'list']);

Route::get('/pesanan/baru', [OrderController::class, 'list']);
Route::get('/pesanan/dikonfirmasi', [OrderController::class, 'dikonfirmasi_list']);
Route::get('/pesanan/dikemas', [OrderController::class, 'dikemas_list']);
Route::get('/pesanan/dikirim', [OrderController::class, 'dikirim_list']);
Route::get('/pesanan/diterima', [OrderController::class, 'diterima_list']);
Route::get('/pesanan/selesai', [OrderController::class, 'selesai_list']);

Route::get('/laporan', [ReportController::class, 'index']);

Route::get('/dashboard', [DashboardController::class, 'index']);
