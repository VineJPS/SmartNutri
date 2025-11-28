<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alimento;
use App\Models\Hidratacao;
use Carbon\Carbon;

class Relatorio extends Controller
{
    public function filtrar(Request $request){
        $data = $request->input('data'); // formato Y-m-d

        // filtra alimentos daquele dia
        $alimentos = Alimento::where('data', $data)->get();

        // filtra hidratação daquele dia
        $hidratacao = Hidratacao::where('data', $data)->first(); // pois só tem 1 por dia

        // somar as kcal desse dia
        $kcalTotal = $alimentos->sum('kcal');
        
        $relatorios = [
            'data' => $data,
            'kcal' => $kcalTotal ?? 0,
            'consumido' => $hidratacao->consumido ?? 0,
        ];

        return view('relatorio', ['relatorios' => [$relatorios]]);
    }
}
