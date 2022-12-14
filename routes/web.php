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

use App\Http\Controllers\EventoController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\TesteController;

Route::get('/', [EventoController::class, 'index']);
Route::get('/evento/criar', [EventoController::class, 'create'])->middleware('auth');
Route::post('eventos', [EventoController::class, 'store']);
Route::get('/evento/visualizar/{id}', [EventoController::class, 'show']);
Route::delete('eventos/{id}', [EventoController::class, 'destroy'])->middleware('auth');
Route::get('/eventos/editar/{id}', [EventoController::class, 'edit'])->middleware('auth');
Route::put('/eventos/update/{id}', [EventoController::class, 'update'])->middleware('auth');
Route::post('/eventos/join/{id}', [EventoController::class, 'joinEvento'])->middleware('auth');
Route::delete('/eventos/sair/{id}', [EventoController::class, 'sair_evento'])->middleware('auth');

Route::get('/contatos', [ContatoController::class, 'index']);
Route::get('/produtos/{id?}', [ProdutoController::class, 'index']);
Route::get('/produtos/listagem/{pesquisar_item}', [ProdutoController::class, 'lista']);
Route::get('/dashboard', [EventoController::class, 'dashboard'])->middleware('auth');
Route::get('/teste/{id?}', [TesteController::class, 'index']);



