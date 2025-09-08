<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alimento;

class Principal extends Controller
{
    function principal(){

        if(auth()->check()){
            return View('principal');
        } else {
            return View('guest');
        }
    }

   function perfilView(){
    return View('perfil');
   }

   function loginPag(){
    return View('login');
   }

   function cadastroPag(){
    return View('cadastro');
   }

   function alimentos(){
    return View('alimentos');
   }
 
   function historico(){
       $data = (date('Y-m-d'));

       $alimentos = Alimento::where('user_id', auth()->id())
       ->whereDate('data', $data)
       ->orderBy('hora', 'desc')
       ->get();
       
        return view('historico', compact('alimentos', 'data'));
   }
   function calc(){
    return View('calc');
   }
}
