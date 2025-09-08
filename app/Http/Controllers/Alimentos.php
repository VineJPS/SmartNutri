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

        // Cria o alimento no banco de dados
        Alimento::create([
            'nome' => $request->nome,
            'data' => $request->data,
            'hora' => $request->time, // aqui mantém 'hora' pois é o nome da coluna no banco
            'kcal' => $request->kcal,
            'gramas' => $request->gramas,
            'user_id' => auth()->id(), // pega o id do usuário logado
        ]);

        return redirect()->route('alimentos')->with('success','Alimento registrado com sucesso!');
    }

    function filtrar(Request $request){

        $data = $request->get('data');

        // Pega os alimentos do usuário logado dentro do intervalo de datas
        $alimentos = Alimento::where('user_id', auth()->id())
            ->whereDate('data', $data)
            ->orderBy('hora', 'desc')
            ->get();

            return view('historico', compact('alimentos', 'data'));
    }

    function remover($id){

        $alimento = Alimento::where('id', $id)
                            ->where('user_id', auth()->id())
                            ->firstOrFail();

        $alimento->delete();

        return redirect()->route('historico')->with('success','Alimento removido com sucesso!');
    }

    function editar(Request $request){
        // $request->validate([
        //     'id' => 'required|exists:alimentos,id',
        //     'data' => 'required|date',
        //     'time' => 'required|date_format:H:i',
        //     'kcal' => 'required|numeric',
        //     'gramas' => 'required|numeric',
        //     'nome' => 'required|string|max:255',
        // ], [
        //     'id.required' => 'ID do alimento é obrigatório',
        //     'id.exists' => 'Alimento não encontrado',
        //     'data.required' => 'O campo data é obrigatório',
        //     'data.date' => 'Data inválida',
        //     'time.required' => 'O campo hora é obrigatório',
        //     'time.date_format' => 'Hora inválida',
        //     'kcal.required' => 'O campo kcal é obrigatório',
        //     'kcal.numeric' => 'Kcal deve ser um número',
        //     'gramas.required' => 'O campo gramas é obrigatório',
        //     'gramas.numeric' => 'Gramas deve ser um número',
        //     'nome.required' => 'O campo nome é obrigatório',
        //     'nome.string' => 'Nome inválido',
        //     'nome.max' => 'Nome deve ter no máximo 255 caracteres',
        // ]);

        // $alimento = Alimento::where('id', $request->id)
        //                     ->where('user_id', auth()->id())
        //                     ->firstOrFail();

        // $alimento->update([
        //     'nome' => $request->nome,
        //     'data' => $request->data,
        //     'hora' => $request->time,
        //     'kcal' => $request->kcal,
        //     'gramas' => $request->gramas,
        // ]);

        // return redirect()->route('historico')->with('success','Alimento editado com sucesso!');
    }
}
