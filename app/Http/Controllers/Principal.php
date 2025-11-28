<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Hidratacao;
use App\Models\Alimento;
use App\Models\Caloria;
use App\Models\Imc;
use Carbon\Carbon;

class Principal extends Controller
{
    function principal()
    {

        if (auth()->check()) {
            $progressoC = Caloria::calcularProgresso();
            $progressoH = Hidratacao::calcularProgresso();
            
            return view('principal', $progressoC, $progressoH);
        } else {
            return View('guest');
        }
    }

    function perfilView()
    {
        $usuario = Auth::user();
        $historico = Imc::buscar(Auth::user()->id);
        return view('perfil', compact('usuario'), compact('historico'));
    }
    function editarDados()
    {
        $usuario = Auth::user();
        $historico = Imc::buscar(Auth::user()->id);
        return view('editardados', compact('usuario'), compact('historico'));
    }

    function loginPag()
    {
        return View('login');
    }

    function cadastroPag()
    {
        return View('cadastro');
    }

    function alimentos()
    {
        return View('alimentos');
    }

    function historico()
    {
        $alimentos = Alimento::doUsuario()->get();
        session()->flash('ultima_acao', 'limpar');
        return view('historico', compact('alimentos'));
    }

    function modal()
    {
        return View('modal');
    }

    function calc()
    {
        return View('calc');
    }

    function metaCaloria()
    {
        $caloria = Caloria::findOut(auth()->user()->id, null);

        return View('caloria', compact('caloria'));
    }
    function metaHidratacao()
    {
        $progresso = Hidratacao::calcularProgresso();

        return View('hidratacao', $progresso);
    }

    function relatorio(){
        $alimentos = Alimento::where('data', '>=', now()->subDays(7))->get();
        $hidratacoes = Hidratacao::where('data', '>=', now()->subDays(7))->get();

                // Agrupa alimentos por data e soma kcal
        $alimentosPorData = $alimentos->groupBy('data')->map(function ($group) {
            return [
                'kcal' => $group->sum('kcal'),
            ];
        });

        // Agrupa hidratações por data e soma consumido
        $hidratacoesPorData = $hidratacoes->groupBy('data')->map(function ($group) {
            return [
                'consumido' => $group->sum('consumido'),
            ];
        });

        // Junta as duas coleções
        $relatorios = collect();

        // Garantir que todas as datas apareçam mesmo se só houver alimento ou só hidratação
        $datas = $alimentosPorData->keys()->merge($hidratacoesPorData->keys())->unique();

        foreach ($datas as $data) {
            $relatorios->push([
                'data' => $data,
                'kcal' => $alimentosPorData[$data]['kcal'] ?? 0,
                'consumido' => $hidratacoesPorData[$data]['consumido'] ?? 0,
            ]);
        }

        // Opcional: ordenar por data DESC
        $relatorios = $relatorios->sortByDesc('data');

        return View('relatorio', compact('relatorios'));
    }
}
