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

    // Home
    Route::get('/', [App\Http\Controllers\Principal::class, 'principal'])->name('index');

// ---------------- Rotas para visitantes - somente para usuários NÃO LOGADOS
Route::middleware(['guest'])->group(function () {

// cadastro
    Route::get('/cadastro', [App\Http\Controllers\Principal::class, 'cadastroPag'])->name('cadastro');
    Route::post('/cadastro', [App\Http\Controllers\Usuario::class, 'criarUsuario'])->name('criarUsuario');

//  login
    Route::get('/login', [App\Http\Controllers\Principal::class, 'loginPag'])->name('pagina-login');
    Route::post('/login', [App\Http\Controllers\Usuario::class, 'autenticarLogin'])->name('login');

});


// ---------------- Rotas protegidas - somente para usuários LOGADOS
Route::middleware(['auth'])->group(function () {
// Perfil
    Route::get('/perfil', [App\Http\Controllers\Principal::class, 'perfilView'])->name('perfil')->middleware('auth');
    Route::get('/logout', [App\Http\Controllers\Usuario::class, 'logout'])->name('logout');

    Route::get('/editarDados', [App\Http\Controllers\Principal::class, 'editarDados'])->name('editarDados')->middleware('auth');
    Route::post('/editarDados', [App\Http\Controllers\Usuario::class, 'editarDados'])->name('editarDados');
    
// Imc calculadora
    Route::get('/calculadora', [App\Http\Controllers\Calculadora::class, 'exibir'])->name('calc.exibir');
    Route::post('/calculadora', [App\Http\Controllers\Calculadora::class, 'calcular'])->name('calc.calcular');
    // Route::post('/calculadora', [App\Http\Controllers\Usuario::class, 'calcular'])->name('calc.calcular');

// Alimentos
    Route::get('/alimentos', [App\Http\Controllers\Principal::class, 'alimentos'])->name('alimentos');
    Route::post('/alimentos', [App\Http\Controllers\Alimentos::class, 'registrar'])->name('alimentos.registrar');
    
// Historico de alimentos
    Route::get('/historico', [App\Http\Controllers\Principal::class, 'historico'])->name('historico');
    Route::get('/historico/filter', [App\Http\Controllers\Alimentos::class, 'filtrar'])->name('historico.filter');
    Route::delete('/historico/{id}', [App\Http\Controllers\Alimentos::class, 'remover'])->name('historico.delete');
    
// Modal de edição de alimentos
    Route::get('/alimentos/{id}/editar', [App\Http\Controllers\Alimentos::class, 'editarModal'])->name('alimentos.editar');
    Route::put('/alimentos/{id}', [App\Http\Controllers\Alimentos::class, 'update'])->name('alimentos.update');
    // Route::get('/modal', [App\Http\Controllers\Principal::class, 'modal'])->name('modal');

// Meta de Calorias
    Route::get('/meta', [App\Http\Controllers\Principal::class, 'metaCaloria'])->name('meta.caloria');
    Route::post('/meta/kcal/define', [App\Http\Controllers\Metas::class, 'definirCaloria'])->name('meta.kcal.definir');
    Route::post('/meta/kcal/remove', [App\Http\Controllers\Metas::class, 'removerCaloria'])->name('meta.kcal.remove');
    
// Meta de Hidratação
    Route::get('/hidratacao', [App\Http\Controllers\Principal::class, 'metaHidratacao'])->name('meta.hidratacao');
    Route::post('/meta/hidratacao/define', [App\Http\Controllers\Metas::class, 'definirHidratacao'])->name('meta.hidratacao.definir');
    Route::get('/meta/hidratacao/more', [App\Http\Controllers\Metas::class, 'moreHidratacao'])->name('meta.hidratacao.more');
    Route::get('/meta/hidratacao/less', [App\Http\Controllers\Metas::class, 'lessHidratacao'])->name('meta.hidratacao.less');
    Route::post('/meta/hidratacao/remove', [App\Http\Controllers\Metas::class, 'removerHidratacao'])->name('meta.hidratacao.remove');

// Relatório Semanal
    Route::get('/relatorio', [App\Http\Controllers\Principal::class, 'relatorio'])->name('relatorio');
    Route::get('/relatorio/filtrar', [App\Http\Controllers\Relatorio::class, 'filtrar'])->name('relatorio.filter');
});