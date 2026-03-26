<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::resource('titles', App\Http\Controllers\TitleController::class);


Route::resource('titleees', App\Http\Controllers\TitleeeController::class);


Route::resource('mahasiswas', App\Http\Controllers\mahasiswaController::class);


Route::resource('petas', App\Http\Controllers\petaController::class);


Route::resource('petaas', App\Http\Controllers\petaaController::class);


Route::resource('karangAsamUlus', App\Http\Controllers\Karang_Asam_UluController::class);
