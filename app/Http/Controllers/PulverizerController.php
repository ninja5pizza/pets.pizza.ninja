<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PulverizerController extends Controller
{
    public function __invoke(string $type): View
    {
        $pulverizer = pulverizer(
            $type,
            collect(
                config('pulverizers')
            )
                ->get($type),
        );

        return view('pulverizer', [
            'pulverizer' => $pulverizer,
            'type' => $type,
        ]);
    }
}
