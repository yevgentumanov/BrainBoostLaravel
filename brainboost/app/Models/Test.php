<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * Test
 *
 * @mixin Builder
 */
class Test extends Model
{
    use HasFactory;

    protected $table = 'tests';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_materia',
        'nombre_test',
        'descripcion',
        'numero_visitas',
        'id_usuario_creador',
        'fecha_creacion',
    ];

    protected $casts = [
        'fecha_creacion' => 'datetime',
    ];
    public function preguntas()
    {
        return $this->hasMany(Pregunta::class, 'id_test');
    }


}
