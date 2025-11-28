<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hidratacao extends Model
{
    use HasFactory;

    protected $table = 'hidratacoes';

    protected $fillable = [
        'meta',
        'consumido',
        'data',
        'status',
        'user_id',
    ];

    protected $casts = [
        'data' => 'date',
        'status' => 'boolean',
    ];


     public static function findOut($userId, $data){
        if ($data == null) {
            $data = today()->format('Y-m-d');
            return self::where('user_id', $userId)
                        ->whereDate('data', $data)
                        ->first(); // Retorna null se não existir
        } else if($data == 'any') {
            return self::where('user_id', $userId)->first();
        } else {
            return self::where('user_id', $userId)
                        ->whereDate('data', $data)
                        ->first(); // Retorna null se não existir
        }
    }

    public static function definirMeta($userId, $metaValor){
        $data = today()->format('Y-m-d');

        $hidratacao = self::findOut($userId, $data);

        if($hidratacao) {
            $hidratacao->update([
                'meta'=> $metaValor
            ]);
        } else {
            return self::create([
                'user_id'=> $userId,
                'data'=> $data,
                'meta'=> $metaValor,
            ]);         
        }
    }

    public static function add(){
        $user = auth()->user();

        $hidratacao = self::findOut($user->id, null);

        if($hidratacao) {
            $hidratacao->update([
                'consumido'=> $hidratacao->consumido + 100
            ]);
        } else {
            return redirect()->route('meta.hidratacao')->with('Error','A meta de hidratação não existe!');
        }
        return redirect()->back()->with('success','Consumido adicionado com sucesso!');
    }
    public static function remove(){
        $user = auth()->user();

        $hidratacao = self::findOut($user->id, null);

        if($hidratacao) {
            $hidratacao->update([
                'consumido'=> $hidratacao->consumido >= 100 ? $hidratacao->consumido - 100 : 0
            ]);
        } else {
            return redirect()->route('meta.hidratacao')->with('Error','A meta de hidratação não existe!');
        }
        return redirect()->back()->with('success','Consumido adicionado com sucesso!');
    }

    public static function removerMeta($userId){
        $data = today()->format('Y-m-d');

        $hidratacao = self::findOut($userId, $data);

        if($hidratacao) {
            $metaValor = 0;
            $hidratacao->update([
                'meta'=> $metaValor,
            ]);
            return redirect()->back()->with('success','Meta removida com sucesso!');
        } else {   
            return redirect()->route('meta.hidratacao')->with('Error','A meta não existe!');
        }
    }

    public static function calcularProgresso()
    {
        $user = auth()->user();

        $metaEnt = self::findOut(auth()->user()->id, null);

        if($metaEnt) {
            $metaH = $metaEnt->meta;
            if ($metaH == 0){
                $consumidosH = 0;
                $porcentagemH = 0;
                $restantesH = 0;
                $metaH = 0;

                return compact('metaH', 'consumidosH', 'porcentagemH', 'restantesH');
            } else{
    
                $consumidosH = $metaEnt->consumido;
                
                $porcentagemH = min(100, max(0, ($consumidosH / $metaH) * 100));
                $restantesH = max(0, $metaH - $consumidosH);
    
                if ($restantesH <= 0) {
                    $metaEnt->update(['status'=> 1]);
                    return compact('metaH', 'consumidosH', 'porcentagemH', 'restantesH');
                } else {
                    return compact('metaH', 'consumidosH', 'porcentagemH', 'restantesH');
                }
            }
        } else {
            $consumidosH = 0;
            $porcentagemH = 0;
            $restantesH = 0;
            $metaH = 0;

            return compact('metaH', 'consumidosH', 'porcentagemH', 'restantesH');
        }
    }
}
