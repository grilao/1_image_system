<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagem extends Model
{
    protected $table = 'imagem';
    protected $fillable = [
        'filename',
        'brilho',
        'contraste',
        'saturacao',
        'template'
    ];
}