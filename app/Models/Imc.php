<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imc extends Model
{
    protected $table = 'resultados';
    protected $fillable = ['user_id', 'imc', 'calorias', 'agua', 'altura', 'peso'];

    public static function buscar($user_id){
        $historico = Imc::where('user_id', $user_id)->latest()->first();

        if($historico){
            return $historico;
        } else {
            $imc = 0;
            $calorias = 0;
            $agua = 0;
            $peso = 0;
            $altura = 0;

            return compact('imc', 'agua', 'peso', 'calorias', 'altura');
        }

    }
}
