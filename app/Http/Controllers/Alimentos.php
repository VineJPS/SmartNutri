<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alimento;

class Alimentos extends Controller
{
    function registrar(Request $request){

        //campo para testar os dados que estão chegando
        // dd($request->all());
        // dd(auth()->check(), auth()->user());
        

        $request->validate([
            'data' => 'required|date',
            'time' => 'required|date_format:H:i', // corrigido aqui
            'kcal' => 'required|numeric',
            'gramas' => 'required|numeric',
            'nome' => 'required|string|max:255',
        ], [
            'data.required' => 'O campo data é obrigatório',
            'data.date' => 'Data inválida',
            'time.required' => 'O campo hora é obrigatório', // corrigido aqui
            'time.date_format' => 'Hora inválida', // corrigido aqui
            'kcal.required' => 'O campo kcal é obrigatório',
            'kcal.numeric' => 'Kcal deve ser um número',
            'gramas.required' => 'O campo gramas é obrigatório',
            'gramas.numeric' => 'Gramas deve ser um número',
            'nome.required' => 'O campo nome é obrigatório',
            'nome.string' => 'Nome inválido',
            'nome.max' => 'Nome deve ter no máximo 255 caracteres',
        ]);

        // Calculo de caloria
        $kcalTotal = ($request->kcal * $request->gramas) / 100;


        // Cria o alimento no banco de dados
        Alimento::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'hora' => $request->time, // aqui mantém 'hora' pois é o nome da coluna no banco
            'kcal' => $kcalTotal,
            'gramas' => $request->gramas,
            'user_id' => auth()->id(), // pega o id do usuário logado
        ]);

        return redirect()->route('alimentos')->with('success','Alimento registrado com sucesso!');
    }

    function filtrar(Request $request){
        $data = $request->get('data', date('Y-m-d'));
        $acao = $request->get('acao');

        //Filtrar ou mostrar tudo
        if ($acao === 'filtrar') 
        {
            session()->flash('ultima_acao', 'filtrar'); // Mantém o valor do campo data após o redirecionamento
            $alimentos = Alimento::filtrarPorData($data)->get();
        } 
        elseif ($acao === 'limpar') 
        {
            session()->flash('ultima_acao', 'limpar');
            $alimentos = Alimento::doUsuario()->get();
        } 
        // Quando não receber valor (default: mostrar tudo)
        elseif ($acao === null)
        {
            session()->flash('ultima_acao', 'limpar');
            $alimentos = Alimento::doUsuario()->get();
        } 
        // Caso ocorra um erro
        else 
        {
            return redirect()->route('historico')->with('error','Ação inválida.');
        }

        //Retorna os dados
        if($alimentos){
            return view('historico', compact('alimentos', 'data'));
        }
        return redirect()->route('historico')->with('error','Nenhum alimento encontrado para a data selecionada.');
    }

    function remover($id){

        $alimento = Alimento::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->firstOrFail();

        $alimento->delete();

        return redirect()->route('historico')->with('success','Alimento removido com sucesso!');
    }


   public function editarModal($id)
    {
        $alimento = Alimento::where('user_id', auth()->id())->findOrFail($id);
        
        // Calcula kcal/100g
        $gramas = $alimento->gramas;
        $kcalPor100g = $gramas > 0 ? ($alimento->kcal * 100) / $gramas : 0;
        
        // Retorna APENAS o conteúdo do modal (sem layout)
        return view('modal', [
            'alimento' => $alimento,
            'kcalPor100g' => round($kcalPor100g, 3)
        ]);
    }

    public function update(Request $request, $id)
    {
        $alimento = Alimento::where('user_id', auth()->id())->findOrFail($id);
        
        $validated = $request->validate([
            'data' => 'required|date',
            'hora' => 'required',
            'nome' => 'required|string|max:255',
            'gramas' => 'required|numeric|min:0.01',
            'kcal' => 'required|numeric|min:0',
        ]);
        
        // Converte kcal/100g para kcal total
        $kcalTotal = ($validated['kcal'] * $validated['gramas']) / 100;
        
        $alimento->update([
            'data' => $validated['data'],
            'hora' => $validated['hora'],
            'nome' => $validated['nome'],
            'gramas' => $validated['gramas'],
            'kcal' => round($kcalTotal, 2),
        ]);
        
        return redirect()->route('historico')->with('success', 'Atualizado!');
    }
}
