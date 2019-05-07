<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    protected $fillable = [
        'nome_pt', 'descricao_pt', 'curso_pt', 'categori_pt', 'faculdade_pt',
        'nome_en', 'descricao_en', 'curso_en', 'categori_en', 'faculdade_en',
        'nome_outro', 'descricao_outro', 'curso_outro', 'categori_outro', 'faculdade_outro', 'data'
    ];
}
