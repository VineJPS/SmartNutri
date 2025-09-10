<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Meta;

class Metas extends Controller
{
    function definirMeta(Request $request){
        $request->validate([
            'meta' => 'required|integer|min:1|max:10000'
        ]);
        
        $user = auth()->user();
        $valorMeta = $request->meta;
        
        Meta::definirMeta($user->id, $valorMeta);
        
        return redirect()->route('index')
                         ->with('success', 'Meta definida com sucesso!');
    }

    function removerMeta(){
        $user = auth()->user();

        Meta::removerMeta($user->id);
        return redirect()->route('index');
    }
}
