<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    protected $fillable = [
        'nome',
        'descricao',
        'altura',
        'largura'
    ];
}
