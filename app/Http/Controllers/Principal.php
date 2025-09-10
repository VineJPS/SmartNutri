<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Alimento;
use App\Models\Meta;


class Principal extends Controller
{
    function principal(){

        if(auth()->check()){
            $progresso = Meta::calcularProgresso();
            return view('principal', $progresso);
        } else {
            return View('guest');
        }
    }

   function perfilView(){
        $usuario = Auth::user();
        return view('perfil', compact('usuario'));
   }

   function loginPag(){
    return View('login');
   }
   function meta(){
    return View('meta');
   }

   function cadastroPag(){
    return View('cadastro');
   }

   function alimentos(){
    return View('alimentos');
   }
 
   function historico(){
        $alimentos = Alimento::doUsuario()->get();
        session()->flash('ultima_acao', 'limpar');
        return view('historico', compact('alimentos'));
   }

    function modal(){
     return View('modal');
    }

   function calc(){
    return View('calc'); 
   }

   function meta(){
    return View('meta');
   }
}
