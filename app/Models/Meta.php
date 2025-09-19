<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;


class Meta extends Model
{
    use HasFactory;

    protected $table = "metas";
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

        $meta = self::findOut($userId, $data);

        if($meta) {
            $meta->update([
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

        $meta = self::findOut($userId, $data);

        if($meta) {
            $metaValor = 0;
            $meta->update([
                'meta'=> $metaValor,
            ]);
            return redirect()->back()->with('success','Meta removida com sucesso!');
        } else {   
            return redirect()->route('meta')->with('Error','A meta não existe!');
        }
    }

    public static function calcularProgresso()
    {
        $user = auth()->user();

        $metaEnt = self::findOut(auth()->user()->id, null);

        if($metaEnt) {
            $meta = $metaEnt->meta;
            if ($meta == 0){
                $consumidos = 0;
                $porcentagem = 0;
                $restantes = 0;
                $meta = 0;

                return compact('meta', 'consumidos', 'porcentagem', 'restantes');
            } else{
    
                $consumidos = Alimento::where('user_id', $user->id)
                                    ->whereDate('data', today())
                                    ->sum('kcal');
                
                $porcentagem = min(100, max(0, ($consumidos / $meta) * 100));
                $restantes = max(0, $meta - $consumidos);
    
                if ($restantes <= 0) {
                    $metaEnt->update(['status'=> 1]);
                    return compact('meta', 'consumidos', 'porcentagem', 'restantes');
                } else {
                    return compact('meta', 'consumidos', 'porcentagem', 'restantes');
                }
            }
        } else {
            $consumidos = 0;
            $porcentagem = 0;
            $restantes = 0;
            $meta = 0;

            return compact('meta', 'consumidos', 'porcentagem', 'restantes');
        }
    }
}
