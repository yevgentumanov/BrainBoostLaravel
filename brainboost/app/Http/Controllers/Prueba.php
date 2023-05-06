<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Prueba extends Controller
{
    function vistaInicial() {
        // $prueba = shell_exec('git --git-dir="/var/www/html/clinicadentalsanandres.com/BrainBoostLaravel/.git" --work-tree="/var/www/html/clinicadentalsanandres.com/BrainBoostLaravel" pull');
        $prueba = shell_exec("git");
        var_dump($prueba);
        
        // return redirect()->route('index');
    }
}
