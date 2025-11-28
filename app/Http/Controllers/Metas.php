<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Caloria;
use App\Models\Hidratacao;

class Metas extends Controller
{
    function definirCaloria(Request $request){
        $request->validate([
            'meta' => 'required|integer|min:1|max:10000'
        ]);
        
        $user = auth()->user();
        $valorMeta = $request->meta;
        
        Caloria::definirMeta($user->id, $valorMeta);
        
        return redirect()->route('index')
                         ->with('success', 'Caloria definida com sucesso!');
    }

    function removerCaloria(){
        $user = auth()->user();

        Caloria::removerMeta($user->id);
        return redirect()->route('index');
    }

     function definirHidratacao(Request $request){
        $request->validate([
            'meta' => 'required|integer|min:1|max:100000'
        ]);
        
        $user = auth()->user();
        $valorMeta = $request->meta;
        
        Hidratacao::definirMeta($user->id, $valorMeta);
        
        return redirect()->route('index')
                         ->with('success', 'Hidratação definida com sucesso!');
    }

    function moreHidratacao(){
        $user = auth()->user();

        Hidratacao::add($user->id);
        return redirect()->back()->with('sucess','Consumido adicionado com sucesso!');
    }

    function lessHidratacao(){
        $user = auth()->user();

        Hidratacao::remove($user->id);
        return redirect()->back()->with('sucess','Consumido removido com sucesso!');
    }

    function removerHidratacao(){
        $user = auth()->user();

        Hidratacao::removerMeta($user->id);
        return redirect()->route('index');
    }
}
