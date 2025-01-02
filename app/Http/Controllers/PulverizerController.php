<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PulverizerController extends Controller
{
    public function __invoke(string $type): View
    {
        return view('pulverizer', ['type' => $type]);
    }
}
