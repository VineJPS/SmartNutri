<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Principal extends Controller
{
    function principal(){
        return View("principal");
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
}
