<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TableName extends Model
{
    use HasFactory;

    protected $table = 'materia';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_materia',
        'nombre_test',
        'descripcion'
    ];
}
