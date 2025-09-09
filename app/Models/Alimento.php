<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Alimento extends Model
{
    use HasFactory;

    protected $table = 'alimentos';
    protected $fillable = [
        'data',
        'hora',
        'kcal',
        'gramas',
        'nome',
        'user_id',
    ];

    protected $casts = [
        'data' => 'date:Y-m-d',
        'kcal' => 'decimal:2',
        'gramas' => 'decimal:2',
    ];

    protected $appends = [
        'hora_formatada',
        'data_formatada',
    ];

    public function getHoraFormatadaAttribute()
    {
        return Carbon::parse($this->hora)->format('H:i');
    }
    
    // Formata data (2025-09-08 → 08/09/2025)
    public function getDataFormatadaAttribute()
    {
        return Carbon::parse($this->data)->format('d/m/Y');
    }

    public function scopeDoUsuario($query)
    {
        return $query->where('user_id', auth()->id())
                     ->orderBy('data', 'desc')
                     ->orderBy('hora', 'desc');
    }

    public function scopeFiltrarPorData($query, $data)
    {
        return $query->whereDate('data', $data)
                    ->orderBy('hora', 'desc');
    }

    

}
