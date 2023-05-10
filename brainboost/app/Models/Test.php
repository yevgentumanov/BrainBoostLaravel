<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Post
 *
 * @mixin Builder
 */
class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';
    protected $primaryKey = 'id';
    protected $fillable = [
        'id_materia',
        'nombre_test',
        'descripcion',
        'numero_visitas',
        'id_usuario_creador',
    ];

}
