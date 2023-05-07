<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function showFirstTest()
    {
        $test = Test::first();
        if ($test) {
            return "The name of the first test is: " . $test->nombre_test;
        } else {
            return "No tests found.";
        }
    }
}
