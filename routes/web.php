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

Route::get('/', [App\Http\Controllers\Principal::class, 'principal'])->name('index');
Route::get('/teste', [App\Http\Controllers\Principal::class, 'teste']);

Route::get('/conectar', [App\Http\Controllers\Usuario::class, 'conectar']);
Route::get('/desconectar', [App\Http\Controllers\Usuario::class, 'desconectar']);
Route::get('/perfil', [App\Http\Controllers\Principal::class, 'perfilView'])->name('perfil');
Route::get('/login', [App\Http\Controllers\Principal::class, 'loginPag'])->name('login');
Route::get('/cadastro', [App\Http\Controllers\Principal::class, 'cadastroPag'])->name('cadastro');

