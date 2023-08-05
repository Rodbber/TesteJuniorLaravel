<?php

use App\Http\Controllers\CargoController;
use App\Http\Controllers\ColaboradorController;
use App\Http\Controllers\UnidadeController;
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

Route::get('/home', function () {
    return view('layout');
});

Route::get('/', function () {
    return redirect('/home');
});


Route::get('/unidades', [UnidadeController::class, 'index']);
Route::get('/colaboradores', [ColaboradorController::class, 'index']);
Route::get('/cargos', [CargoController::class, 'index']);



Route::prefix('/relatorio')->group(function () {
    Route::get('/colaborador', [ColaboradorController::class, 'relatorio']);
    Route::get('/colaborador/ranking', [ColaboradorController::class, 'ranking']);
    Route::get('/unidade/quantidade-colaborador', [UnidadeController::class, 'relatorio_colaboradores']);
});

Route::post('/unidade', [UnidadeController::class, 'create']);

Route::prefix('/colaborador')->group(function () {
    Route::post('/', [ColaboradorController::class, 'create']);

    Route::patch('/update/nota/{colaborador_id}', [CargoColaboradorController::class, 'update']);
});
