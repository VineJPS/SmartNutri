<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Imc;


class Calculadora extends Controller
{
    public function calcular(Request $request)
    {

        $peso = $request->peso;
        $altura = $request->altura / 100; // cm -> metros
        $idade = $request->idade;
        $genero = $request->genero;

        $imc = $peso / ($altura * $altura);

        if ($imc < 18.5) {
            $classificacao = "Abaixo do peso";
        } elseif ($imc < 24.9) {
            $classificacao = "Peso normal";
        } elseif ($imc < 29.9) {
            $classificacao = "Sobrepeso";
        } else {
            $classificacao = "Obesidade";
        }

        // Formula Harris Benedict
        if ($genero == "masculino") {
            $calorias = 88.36 + (13.4 * $peso) + (4.8 * ($altura * 100)) - (5.7 * $idade);
        } else {
            $calorias = 447.6 + (9.2 * $peso) + (3.1 * ($altura * 100)) - (4.3 * $idade);
        }

        $agua = $peso * 35; // em ml

        $userId = Auth::id();
        Imc::create([
            'user_id' => $userId,
            'imc' => $imc,
            'calorias' => $calorias,
            'agua' => $agua,
            'peso' => $peso,
            'altura' => $altura
        ]);

        // pega o usuário logado
        $user = Auth::user();

        // busca os resultados dele
        $historico = Imc::where('user_id', $user->id)->get();

        return view('calc', compact('historico'));
        // return view('calc', compact('imc', 'classificacao', 'calorias', 'agua', 'peso', 'altura', 'idade', 'genero'));
    }
    public function exibir()
    {
        $historico = Imc::where('user_id', Auth::id())->get();

        return view('calc', compact('historico'));
    }
}
