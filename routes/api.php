<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotas privadas
Route::prefix('v1')->middleware('jwt.auth')->group(function(){
    Route::apiresource('cliente', 'ClienteController');
    Route::apiresource('fornecedor', 'FornecedorController');
    Route::apiresource('servico', 'ServicoController');
    Route::apiresource('ordem', 'OrdemController');
    Route::apiresource('states', 'StateController');
    Route::apiresource('cities', 'CityController');
    Route::post('me', 'AuthController@me');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('logout', 'AuthController@logout');
    
});

// Rotas Publicas
Route::post('login', 'AuthController@login');
