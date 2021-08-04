<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AddressController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\ProfileController;

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
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/dados-pessoais', [ProfileController::class, 'edit'])->middleware(['auth'])->name('dados-pessoais');
Route::post('/dados-pessoais/salvar', [ProfileController::class, 'store'])->middleware(['auth']);
Route::post('/dados-pessoais/editar/salvar', [ProfileController::class, 'update'])->middleware(['auth']);

Route::get('/enderecos', [AddressController::class, 'index'])->middleware(['auth'])->name('enderecos');
Route::post('/enderecos/salvar', [AddressController::class, 'store'])->middleware(['auth']);
Route::get('/enderecos/editar/{address}', [AddressController::class, 'edit'])->middleware(['auth']);
Route::post('/enderecos/editar/salvar', [AddressController::class, 'update'])->middleware(['auth']);
Route::get('/enderecos/excluir/{address}', [AddressController::class, 'destroy'])->middleware(['auth']);

Route::get('/filmes-favoritos', [FilmController::class, 'index'])->middleware(['auth'])->name('filmes-favoritos');
Route::get('/filmes-favoritos/editar/{film}', [FilmController::class, 'edit'])->middleware(['auth']);
Route::post('/filmes-favoritos/editar/salvar', [FilmController::class, 'update'])->middleware(['auth']);
Route::post('/filmes-favoritos/salvar', [FilmController::class, 'store'])->middleware(['auth']);
Route::get('/filmes-favoritos/excluir/{film}', [FilmController::class, 'destroy'])->middleware(['auth']);