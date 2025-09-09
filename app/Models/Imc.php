<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    protected $table = 'resultados';
    protected $fillable = ['user_id', 'imc', 'calorias', 'agua'];
}
