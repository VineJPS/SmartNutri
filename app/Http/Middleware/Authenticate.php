<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Verifica se o usuario esta logado
        // Se for uma requisição API/JSON, retorna null
        if ($request->expectsJson()) {
            return null;
        }
        
        // Isso evita o loop infinito
        if (!$request->is('login') && !$request->is('logout') && !$request->is('cadastro')) {
            return route('index'); // ← Redireciona para a página guest
        }
        
        return route('login');
    }
}
