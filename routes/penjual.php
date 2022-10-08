<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Penjual\DashboardController;
use App\Http\Controllers\Penjual\PenjualController;
use App\Http\Controllers\Penjual\ProdukController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['auth:penjual']], function () {
    Route::get('/penjual',[PenjualController::class,'index'])->name('penjual.index');
});
Route::prefix('penjual/')->name('penjual.')->group(function(){
    Route::get('akun', [PenjualController::class,'akun'])->name('akun');
    Route::get('pembayaran', [PenjualController::class,'pembayaran'])->name('pembayaran');
    Route::get('settings', [PenjualController::class,'settings'])->name('settings');
    Route::get('profile', [PenjualController::class,'profile'])->name('profile');
    Route::get('login', [AuthController::class,'penjualIndex'])->name('login');
    Route::get('dataproduk', [DashboardController::class,'dataproduk'])->name('dataproduk');
    Route::get('datapesanan', [DashboardController::class,'datapesanan'])->name('datapesanan');
    Route::get('datapembayaran', [DashboardController::class,'datapembayaran'])->name('datapembayaran');
    Route::resource('produk', ProdukController::class);
    Route::prefix('auth/')->name('auth.')->group(function(){
        Route::post('login', [AuthController::class,'penjualLogin'])->name('login');
        Route::get('logout', [AuthController::class,'penjualLogout'])->name('logout');
    });
});

