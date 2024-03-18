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

Route::get('/', [\App\Http\Controllers\ColaboradorController::class, 'index']);

Route::resource('unidades', \App\Http\Controllers\UnidadeController::class)->except(['show', 'edit', 'update', 'destroy']);
Route::resource('colaboradores', \App\Http\Controllers\ColaboradorController::class)->except(['show', 'edit', 'update', 'destroy']);
Route::get('/colaboradores/desempenho/edit/{colaborador_id}', [\App\Http\Controllers\ColaboradorController::class, 'desempenhoEdit'])->name('colaboradores.desempenho.edit');
Route::patch('/colaboradores/desempenho/store/{id}', [\App\Http\Controllers\ColaboradorController::class, 'desempenhoStore'])->name('colaboradores.desempenho.store');
Route::get('/colaboradores/ranking', [\App\Http\Controllers\ColaboradorController::class, 'ranking'])->name('colaboradores.ranking');
