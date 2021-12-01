<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EtapaController;
use App\Http\Controllers\ProjetoController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\TempoController;
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

Route::get('/', [ProjetoController::class, 'index']);

Route::get('/clientes', [ClienteController::class, 'index'])->name('clientes.index');
Route::post('/clientes', [ClienteController::class, 'store'])->name('clientes.store');
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
Route::get('/clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
Route::patch('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');

Route::get('/etapas', [EtapaController::class, 'index'])->name('etapas.index');
Route::post('/etapas', [EtapaController::class, 'store'])->name('etapas.store');
Route::get('/etapas/create', [EtapaController::class, 'create'])->name('etapas.create');
Route::get('/etapas/{etapa}', [EtapaController::class, 'show'])->name('etapas.show');
Route::patch('/etapas/{etapa}', [EtapaController::class, 'update'])->name('etapas.update');
Route::delete('/etapas/{etapa}', [EtapaController::class, 'destroy'])->name('etapas.destroy');
Route::get('/etapas/{etapa}/edit', [EtapaController::class, 'edit'])->name('etapas.edit');

Route::get('/projetos', [ProjetoController::class, 'index'])->name('projetos.index');
Route::post('/projetos', [ProjetoController::class, 'store'])->name('projetos.store');
Route::get('/projetos/create', [ProjetoController::class, 'create'])->name('projetos.create');
Route::get('/projetos/{projeto}', [ProjetoController::class, 'show'])->name('projetos.show');
Route::patch('/projetos/{projeto}', [ProjetoController::class, 'update'])->name('projetos.update');
Route::delete('/projetos/{projeto}', [ProjetoController::class, 'destroy'])->name('projetos.destroy');
Route::get('/projetos/{projeto}/edit', [ProjetoController::class, 'edit'])->name('projetos.edit');

Route::get('/tarefas', [TarefaController::class, 'index'])->name('tarefas.index');
Route::post('/tarefas', [TarefaController::class, 'store'])->name('tarefas.store');
Route::get('/tarefas/create', [TarefaController::class, 'create'])->name('tarefas.create');
Route::get('/tarefas/{tarefa}', [TarefaController::class, 'show'])->name('tarefas.show');
Route::patch('/tarefas/{tarefa}', [TarefaController::class, 'update'])->name('tarefas.update');
Route::delete('/tarefas/{tarefa}', [TarefaController::class, 'destroy'])->name('tarefas.destroy');
Route::get('/tarefas/{tarefa}/edit', [TarefaController::class, 'edit'])->name('tarefas.edit');
Route::get('/tarefas/{tarefa}/tempos', [TarefaController::class, 'tempos'])->name('tarefas.tempos');

Route::post('/tempos', [TempoController::class, 'store'])->name('tempos.store');
Route::put('/tempos/{tempo}', [TempoController::class, 'update'])->name('tempos.update');
Route::delete('/tempos/{tempo}', [TempoController::class, 'destroy'])->name('tempos.destroy');
Route::get('/tempos/{tempo}/edit', [TempoController::class, 'edit'])->name('tempos.edit');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
