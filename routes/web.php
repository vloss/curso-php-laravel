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
Route::get('/evento/criar', [EventoController::class, 'create']);
Route::get('/contatos', [ContatoController::class, 'index']);
Route::get('/produtos/{id?}', [ProdutoController::class, 'index']);
Route::get('/produtos/listagem/{pesquisar_item}', [ProdutoController::class, 'lista']);

Route::get('/teste', [TesteController::class, 'index']);