<?php

use App\Http\Controllers\Api\ComentarioController;
use App\Http\Controllers\Api\JuegoController;
use App\Http\Controllers\Api\ObjetoController;
use App\Http\Controllers\Api\PaginaController;
use App\Http\Controllers\Api\RolController;
use App\Http\Controllers\Api\SubPaginaController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::apiResource('comentario', ComentarioController::class);
Route::apiResource('juego', JuegoController::class);
Route::apiResource('objeto', ObjetoController::class);
Route::apiResource('pagina', PaginaController::class);
Route::apiResource('rol', RolController::class);
Route::apiResource('subpagina', SubPaginaController::class);
Route::apiResource('usuarios', UsuarioController::class);
