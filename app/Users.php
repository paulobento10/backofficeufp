<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject; 

class Users extends Model implements JWTSubject
{
    protected $fillable = [
        'nome', 'password', 'curso', 'plano'
    ];

    public
    function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public
    function getJWTCustomClaims()
    {
        return [];
    }

    public
    function setPasswordAttribute($password)
    {
        if (!empty($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }
}

interface JWTSubject
{
    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier();

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims();
}