<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductSaleController;
use App\Http\Controllers\Backend\TransactionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'home'])->name('home');

Route::get('/admin/products/sale', [ProductSaleController::class, 'index'])->name('sales.index');
Route::post('/admin/products/sale', [ProductSaleController::class, 'store'])->name('sales.store');

Route::resource('/admin/products', ProductController::class);

Route::resource('/admin/transactions', TransactionController::class)->only('index', 'show', 'destroy');

