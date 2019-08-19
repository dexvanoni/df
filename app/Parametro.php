<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parametro extends Model
{
         protected $fillable = [
         	'usuario',
        	'mil_pontos',
            'entretela',
            'tnt',
            'linha_sup',
            'linha_bob',
            'pontos_min',
            'lucro',

    ];
}
