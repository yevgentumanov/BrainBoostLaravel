<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TableName extends Model
{
    use HasFactory;

    protected $table = 'materias';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_materia',
        'nombre_test',
        'descripcion'
    ];
}
