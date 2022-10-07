<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\User\AuthController;
use App\Http\Controllers\WebController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect()->route('auth.admin.index');
});

// Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin',[AdminController::class,'index'])->name('admin.index');
// });

Route::get('home', [WebController::class,'home'])->name('home');
Route::prefix('admin/auth/')->name('admin.auth.')->group(function(){
    Route::get('index', [AuthController::class,'index'])->name('index');
    Route::get('forgot', [AuthController::class,'forgot'])->name('forgot');
    Route::post('login', [AuthController::class,'login'])->name('login');
    Route::get('logout', [AuthController::class,'logout'])->name('logout');
});
    
