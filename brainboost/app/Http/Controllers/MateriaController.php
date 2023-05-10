<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Materia;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;


class MateriaController extends Controller
{
    public function index(){
        $materia = Materia::find(1);
        dd($materia);
    }
    //
}
