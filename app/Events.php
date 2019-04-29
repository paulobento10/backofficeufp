<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'nome', 'data', 'descricao', 'curso', 'categoria', 'faculdade'
    ];
}
