<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // ✅ Importante!

class Usuario extends Controller
{
    function autenticarLogin(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.email' => 'O campo usuário (e-mail) é obrigatório!',
            'password.required' => 'O campo password é obrigatório!'
        ]);

        // Usando auth 
        if (Auth::attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/');
        }

        return view('login', [
            'erro' => 'Usuário e/ou senha não existe(m)'
        ]);
    }

    public function criarUsuario(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'email'     => 'required|email|unique:users,email',
            'confEmail' => 'required|same:email',
            'senha'     => 'required|min:6',
            'confSenha' => 'required|same:senha',
        ], [
            'name.required'      => 'O campo nome é obrigatório',
            'email.required'     => 'O campo e-mail é obrigatório',
            'email.email'        => 'E-mail inválido',
            'email.unique'       => 'Já existe um usuário com esse e-mail',
            'confEmail.same'     => 'Os e-mails não coincidem',
            'senha.required'     => 'O campo senha é obrigatório',
            'senha.min'          => 'A senha deve ter no mínimo 6 caracteres',
            'confSenha.same'     => 'As senhas não coincidem',
        ]);

        // Criando usuario no bd
        $usuario = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->senha), //hash é um ngc para criptografar a senha
        ]);

        // Loga automaticamente após o cadastro
        Auth::login($usuario);

        return redirect('/');
    }

    public function logout(Request $request)
    {
        // Desloga o usuario
        Auth::logout();
        $request->session()->invalidate();      // Invalida a sessão
        $request->session()->regenerateToken();       // Regenera o token CSRF (configuração de segurança)
        
        return redirect('/');
    }
}