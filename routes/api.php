<?php

use App\Http\Controllers\CargoColaboradorController;
use App\Http\Controllers\UnidadeController;
use App\Models\CargoColaborador;
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

Route::post('/unidade', [UnidadeController::class, 'create']);

Route::prefix('/colaborador')->group(function(){
    Route::post('/', [ColaboradorController::class, 'create']);

    Route::patch('/update/nota/{colaborador_id}', [CargoColaboradorController::class, 'update']);
});

