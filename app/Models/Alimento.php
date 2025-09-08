<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        'data' => 'date',
        // 'hora' => 'time',
        'kcal' => 'decimal:2',
        'gramas' => 'decimal:2',
    ];
}
