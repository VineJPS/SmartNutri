<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\LogAcessoMiddleware;
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

// Principal
Route::get('/', [App\Http\Controllers\Principal::class, 'principal'])->name('index');
Route::get('/alimentos', [App\Http\Controllers\Principal::class, 'alimentos'])->name('alimentos');
Route::get('/historico', [App\Http\Controllers\Principal::class, 'historico'])->name('historico');
Route::get('/perfil', [App\Http\Controllers\Principal::class, 'perfilView'])->name('perfil');
Route::get('/calculadora', [App\Http\Controllers\Principal::class, 'calc'])->name('calc');

Route::get('/login', [App\Http\Controllers\Principal::class, 'loginPag'])->name('login');
Route::get('/cadastro', [App\Http\Controllers\Principal::class, 'cadastroPag'])->name('cadastro');

// Conexão
Route::get('/conectar', [App\Http\Controllers\Usuario::class, 'conectar']);
Route::get('/desconectar', [App\Http\Controllers\Usuario::class, 'desconectar']);

// Pagina Alimentos
Route::get('/principal', [App\Http\Controllers\Alimentos::class, 'principal'])->name('voltar');
