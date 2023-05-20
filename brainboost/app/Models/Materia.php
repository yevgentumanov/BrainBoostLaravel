<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableName extends Model
{
    protected $table = 'materias';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_categoria',
        'nombre_materia',
        'descripcion',
    ];

    // Define any additional properties or methods for the model here
}
