<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AdminOrderController;
use App\Http\Controllers\AdminProductController;

/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/

Route::get('/', [ProductController::class, 'index']);

Route::get('/detail/{id}',
[ProductController::class, 'detail']);

Route::get('/keranjang', function () {

    return view('keranjang');

});

Route::get('/checkout', function () {

    return view('checkout');

});

Route::post('/checkout',
[CheckoutController::class, 'store']);

/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('/login',
[AuthController::class, 'login']);

Route::post('/login',
[AuthController::class, 'prosesLogin']);

Route::get('/logout',
[AuthController::class, 'logout']);

/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::get('/admin/dashboard', function () {

    return view('admin.dashboard');

});

/*
|--------------------------------------------------------------------------
| ADMIN PRODUK
|--------------------------------------------------------------------------
*/

Route::get('/admin/produk',
[AdminProductController::class, 'index']);

Route::get('/admin/tambah-produk',
[AdminProductController::class, 'create']);

Route::post('/admin/tambah-produk',
[AdminProductController::class, 'store']);

Route::get('/admin/edit-produk/{id}',
[AdminProductController::class, 'edit']);

Route::post('/admin/update-produk/{id}',
[AdminProductController::class, 'update']);

Route::get('/admin/hapus-produk/{id}',
[AdminProductController::class, 'destroy']);

/*
|--------------------------------------------------------------------------
| ADMIN PESANAN
|--------------------------------------------------------------------------
*/

Route::get('/admin/pesanan',
[AdminOrderController::class, 'index']);