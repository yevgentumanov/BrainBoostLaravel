<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class test_usuario extends Model
{
    use HasFactory;

    protected $table = 'your_table_name';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
        'id_test',
        'id_usuario',
        'nota',
        'fecha_realizacion',
        'respuestas',
    ];

    protected $casts = [
        'nota' => 'decimal:5,2',
        'fecha_realizacion' => 'date',
    ];
}
