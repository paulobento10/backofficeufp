<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $fillable = [
        'nome', 'password', 'curso', 'plano'
    ];
}
