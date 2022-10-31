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
Route::post('eventos', [EventoController::class, 'store']);
Route::get('/evento/visualizar/{id}', [EventoController::class, 'show']);

Route::get('/contatos', [ContatoController::class, 'index']);
Route::get('/produtos/{id?}', [ProdutoController::class, 'index']);
Route::get('/produtos/listagem/{pesquisar_item}', [ProdutoController::class, 'lista']);

Route::get('/teste/{id?}', [TesteController::class, 'index']);
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
