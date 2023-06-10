<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Usuario extends Model implements Authenticatable
{
    use HasFactory, AuthenticatableTrait;

    protected $table = 'usuarios';
    public $timestamps = false;

    protected $primaryKey = 'id'; // Nombre de la columna de clave primaria

    protected $fillable = [
        'nombre_usuario',
        'google_id',
        'password',
        'email'
    ];
}

