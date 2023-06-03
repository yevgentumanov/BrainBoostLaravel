<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\VIntentosTest;
use Illuminate\Http\Request;

class VIntentosTestController extends Controller
{
    public function historialTestRealizados()
    {
        $tests = VIntentosTest::all(); // Retrieve all data from the view
//        dd($tests);
        return view('historialTestRealizados', compact('tests'));
    }
}
