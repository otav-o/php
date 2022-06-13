<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\RecadoController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\PacienteController;
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

Route::get('/', IndexController::class)->name('home');



Route::prefix('admin')->group(function(){

    Route::prefix('recados')->namespace('Admin')->name('recados.')->group(function(){
        Route::get('/create',[RecadoController::class,'create'])->name('create');
        Route::post('/store',[RecadoController::class,'store'])->name('store');
    });

    Route::resource('posts',PostController::class);
});


Route::resource('admin/pacientes',PacienteController::class);
