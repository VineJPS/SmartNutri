<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\Alimento;


class Caloria extends Model
{
    use HasFactory;

    protected $table = "calorias";
    protected $fillable = ['user_id', 'data', 'meta', 'status'];

    protected $casts = [
        'data' => 'date:Y-m-d',
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

        $caloria = self::findOut($userId, $data);

        if($caloria) {
            $caloria->update([
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

    public static function removerMeta($userId){
        $data = today()->format('Y-m-d');

        $caloria = self::findOut($userId, $data);

        if($caloria) {
            $metaValor = 0;
            $caloria->update([
                'meta'=> $metaValor,
            ]);
            return redirect()->back()->with('success','Caloria removida com sucesso!');
        } else {   
            return redirect()->route('meta.caloria')->with('Error','A caloria não existe!');
        }
    }

    public static function calcularProgresso()
    {
        $user = auth()->user();


        $metaEnt = self::findOut(auth()->user()->id, null);

        if($metaEnt) {
            $metaC = $metaEnt->meta;
            if ($metaC == 0){
                $consumidosC = 0;
                $porcentagemC = 0;
                $restantesC = 0;
                $metaC = 0;

                return compact('metaC', 'consumidosC', 'porcentagemC', 'restantesC');
            } else{
    

                $consumidosC = Alimento::where('user_id', $user->id)
                                    ->whereDate('data', today())
                                    ->sum('kcal');

                
                $porcentagemC = min(100, max(0, ($consumidosC / $metaC) * 100));

                $restantesC = max(0, $metaC - $consumidosC);
    
                if ($restantesC <= 0) {
                    $metaEnt->update(['status'=> 1]);
                    return compact('metaC', 'consumidosC', 'porcentagemC', 'restantesC');
                } else {
                    return compact('metaC', 'consumidosC', 'porcentagemC', 'restantesC');
                }
            }
        } else {
            $consumidosC = 0;
            $porcentagemC = 0;
            $restantesC = 0;
            $metaC = 0;

            return compact('metaC', 'consumidosC', 'porcentagemC', 'restantesC');
        }
    }
}
