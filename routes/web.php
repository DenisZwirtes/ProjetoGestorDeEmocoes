<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PaginaInicialController;
use App\Http\Controllers\FotoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\GerenciarController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/auth-login', [LoginController::class, 'loginShow'])->name('authlogin');
Route::post('/login-index', [LoginController::class, 'loginIndex'])->name('loginIndex');
Route::get('/login-mensagem', [LoginController::class, 'loginIndexMensagem'])->name('loginIndexMensagem');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/inicio', [PaginaInicialController::class, 'paginaInicial'])->name('paginaIncial');
Route::get('/upload-foto', [FotoController::class, 'mostrarFormulario'])->name('mostrarFormulario');
Route::post('/upload-foto', [FotoController::class, 'uploadFoto'])->name('uploadFoto');
Route::post('/upload-foto-perfil', [FotoController::class, 'uploadFoto'])->name('uploadFoto');
Route::get('/perfil', [PerfilController::class,'index'])->name('opcaoPerfil');
Route::post('/salvar-perfil', [PerfilController::class,'salvarPerfil'])->name('salvarPerfil');
Route::get('/status', [StatusController::class,'index'])->name('opcaoStatus');
Route::post('/verificar-status', [StatusController::class,'verificarStatus'])->name('verificarStatus');
Route::get('/gerenciar', [GerenciarController::class,'index'])->name('opcaoGerenciar');
Route::post('/gerenciar-familia', [GerenciarController::class,'familia'])->name('opcaoGerenciarFamilia');
Route::post('/gerenciar-geral', [GerenciarController::class,'geral'])->name('opcaoGerenciarGeral');
Route::post('/gerenciar-trabalho', [GerenciarController::class,'trabalho'])->name('opcaoGerenciarTrabalho');



