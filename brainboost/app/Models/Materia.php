<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Materia extends Model
{
    use HasFactory;

    protected $table = 'materias'; // Nombre de la tabla

    protected $primaryKey = 'id'; // Nombre de la columna de clave primaria

    public $timestamps = false; // La tabla no tiene columnas para created_at y updated_at (timestamps)

    protected $fillable = [
        'id_categoria', // Lista de atributos del modelo que se pueden asignar de forma masiva (mediante create o update)
        'nombre_materia',
        'descripcion'
    ];
}
