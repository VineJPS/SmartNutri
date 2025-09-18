<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use Illuminate\Support\Facades\Hash; // ✅ Importante!
use Illuminate\Support\Facades\Auth;


class Usuario extends Controller
{
    function autenticarLogin(Request $request)
    {
        $request->validate([
            'email' => '|email',
            'password' => '',
        ], [
            'email.email' => 'O campo usuário (e-mail) é obrigatório!',
            'password.' => 'O campo password é obrigatório!'
        ]);

        // Usando auth 
        if (
            Auth::attempt([
                'email' => $request->email,
                'password' => $request->password
            ], $request->remember)
        ) {
            $request->session()->regenerate();

            // pega o usuário logado
            $usuario = Auth::user();

            // cria um array na sessão
            $request->session()->put('usuario', [
                'id' => $usuario->id,
                'name' => $usuario->name,
                'email' => $usuario->email,
                'genero' => $usuario->genero,
                'dataNasc' => $usuario->dataNasc,
            ]);
            return redirect()->intended('/');
        }

        return view('login', [
            'erro' => 'Usuário e/ou senha não existe(m)'
        ]);
    }

    public function criarUsuario(Request $request)
    {
        $request->validate([
            'name' => '|string|max:255',
            'email' => '|email|unique:users,email',
            'confEmail' => '|same:email',
            'senha' => '|min:6',
            'confSenha' => '|same:senha',
        ], [
            'name.' => 'O campo nome é obrigatório',
            'email.' => 'O campo e-mail é obrigatório',
            'email.email' => 'E-mail inválido',
            'email.unique' => 'Já existe um usuário com esse e-mail',
            'confEmail.same' => 'Os e-mails não coincidem',
            'senha.' => 'O campo senha é obrigatório',
            'senha.min' => 'A senha deve ter no mínimo 6 caracteres',
            'confSenha.same' => 'As senhas não coincidem',
        ]);

        // Criando usuario no bd
        $usuario = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->senha), //hash é um ngc para criptografar a senha,
            'genero' => 'ser humano',
            'dataNasc' => '2015-09-02'
        ]);

        // Loga automaticamente após o cadastro
        Auth::login($usuario);

        return redirect('/');
    }

   public function editarDados(Request $request)
{
    $usuario = Auth::user(); // pega o usuário logado

    
    $request->validate([
        'name' => 'nullable|string|max:255',
        'email' => 'nullable|email|unique:users,email,' . $usuario->id,
        'genero' => 'nullable|string',
        'dataNasc' => 'nullable|date'
    ]);
    

    $dadosAtualizados = [];

    if ($request->has('name') && $request->name !== null && $request->name != $usuario->name) {
        $dadosAtualizados['name'] = $request->name;
    }
    
    if ($request->has('email') && $request->email !== null && $request->email != $usuario->email) {
        $dadosAtualizados['email'] = $request->email;
    }
    
    if ($request->has('genero') && $request->genero !== null && $request->genero != $usuario->genero) {
        $dadosAtualizados['genero'] = $request->genero;
    }
    
    if ($request->has('dataNasc') && $request->dataNasc !== null && $request->dataNasc != $usuario->dataNasc) {
        $dadosAtualizados['dataNasc'] = $request->dataNasc;
    }
    
    if (!empty($dadosAtualizados)) {
        $usuario->update($dadosAtualizados);
    }
    
    return redirect()->back()->with('sucesso', 'Perfil atualizado com sucesso!');
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