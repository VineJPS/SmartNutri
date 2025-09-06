<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\View;

class Usuario extends Controller
{
    function autenticarLogin(Request $request){
        //Verificando se os dados estão corretos
        $erro = '';
        $regras = [
            'email' => 'email',
            'password' => 'required',
        ];

        $feedback = [
            'email.email' => 'O campo usuário (e-mail) é obrigatório!',
            'password.required' => 'o campo password é obrigatório!'
        ];

        $request->validate($regras, $feedback);

        //Recuperando os dados do formulario
        $email = $request->get('email');
        $password = $request->get('password');

        //Recuperando os dados do BD
        $user = new User();

        $usuario = $user->where('email', $email)
            ->where('password', $password)
            ->get()
            ->first();

        if (isset($usuario->email)) {
            session_start();
            $_SESSION['usuario'] = [
                'id' => $usuario->id,
                'name' => $usuario->name,
                'email' => $usuario->email,
            ];

            // print_r($_SESSION['usuario']);
            return View('principal');
        } else {
            $erro = 'Usuário e/ou senha não exte(m)';
            return View('login', ['erro' => $erro]);
        }
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

        $usuario = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => $request->senha,
        ]);
        return view('login');
    }
}
