<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'username',
        'clave',
        'imagen'
    ];
}
