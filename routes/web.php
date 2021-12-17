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
Route::get('/clientes/cadastro', function(){
    return view ('app.clientes_cadastro');
})->name('clientes_cadastro')->middleware('auth');
Route::get('/cliente/dados', function(){
    return view ('app.cliente_dados');
})->name('cliente_dados')->middleware('auth');
Route::get('/clientes/consulta', function(){
    return view ('app.clientes_consulta');
})->name('clientes_consulta')->middleware('auth');