<?php

use App\Http\Controllers\User\AuthController;
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

Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('home', [WebController::class,'home'])->name('home');
Route::prefix('auth/')->name('auth.')->group(function(){
    Route::get('index', [AuthController::class,'index'])->name('index');
    Route::get('forgot', [AuthController::class,'forgot'])->name('forgot');
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
});

