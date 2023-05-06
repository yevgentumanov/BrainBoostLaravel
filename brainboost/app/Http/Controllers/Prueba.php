<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Prueba extends Controller
{
    function vistaInicial() {
        $repoPath = '/var/www/html/clinicadentalsanandres.com/BrainBoostLaravel/brainboost';
        chdir($repoPath);
        $comando = "git pull";
        
        // $comando = 'git --git-dir="/var/www/html/clinicadentalsanandres.com/BrainBoostLaravel/.git" --work-tree="/var/www/html/clinicadentalsanandres.com/BrainBoostLaravel/brainboost" pull';
        $output = array();
        $returnValue = 0;
        
        exec($comando, $output, $returnValue);
        
        var_dump($comando);
        echo "\n<br>\n";

        var_dump($output);
        echo "\n<br>\n";

        var_dump($returnValue);
        echo "\n<br>\n";
        
        // return redirect()->route('index');
    }
}
