<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UnitKerjaController;
use App\Http\Controllers\KurirController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TerimaController;
use App\Http\Controllers\KirimController;

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

Auth::routes();



Route::group(['middleware' => ['auth','CheckRole:1']], function(){
    Route::resources([
        'unit-kerja' => UnitKerjaController::class,
        'kurir' => KurirController::class,
        'user' => UserController::class,
        'terima' => TerimaController::class,
        'kirim'=> KirimController::class
    ]);
    Route::get('/terima/update-status/{id}',[TerimaController::class, 'updateview'])->name('terima.updateview');
    Route::patch('/terima/update-status/{id}',[TerimaController::class, 'updateterima'])->name('terima.updateterima');
    Route::get('/kirim/update-status/{id}',[KirimController::class, 'updateview'])->name('kirim.updateview');
    Route::patch('/kirim/update-status/{id}',[KirimController::class, 'updateterima'])->name('kirim.updateterima');

});


Route::group(['middleware' => ['auth','CheckRole:1,2']], function(){
    Route::post('/kirim', [KirimController::class, 'store'])->name('kirim.store');
    
});

Route::group(['middleware' => ['auth','CheckRole:1,3']], function(){

    Route::post('/terima', [TerimaController::class, 'store'])->name('terima.store');
   
});

Route::group(['middleware' => ['auth','CheckRole:1,2,3']], function(){
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');
    Route::get('/terima', [TerimaController::class, 'index'])->name('terima.index');
    Route::get('/kirim', [KirimController::class, 'index'])->name('kirim.index');
});



