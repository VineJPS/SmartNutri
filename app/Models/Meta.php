<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    use HasFactory;

    protected $fillable = [];

    protected $casts = [];

    public static function calcularProgresso()
    {
        $user = auth()->user();
        
        $meta = 2000; // Valor fixo por enquanto
        $consumidos = Alimento::where('user_id', $user->id)
                            ->whereDate('data', today())
                            ->sum('kcal');
        
        $porcentagem = min(100, max(0, ($consumidos / $meta) * 100));
        $restantes = max(0, $meta - $consumidos);

        return compact('meta', 'consumidos', 'porcentagem', 'restantes');
    }
}
