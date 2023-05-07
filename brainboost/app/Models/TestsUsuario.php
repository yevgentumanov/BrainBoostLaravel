<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestsUsuario extends Model
{
    use HasFactory;

    protected $table = 'tests_usuarios';

    protected $fillable = [
        'id_test',
        'id_usuario',
        'nota',
        'fecha_realizacion',
        'respuestas'
    ];

    protected $dates = [
        'fecha_realizacion'
    ];
}
