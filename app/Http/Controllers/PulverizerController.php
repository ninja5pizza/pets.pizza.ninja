<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PulverizerController extends Controller
{
    public function index(): View
    {
        return view('pulverizers.index');
    }

    public function show(string $type): View
    {
        $pulverizer = pulverizer(
            $type,
            collect(
                config('pulverizers')
            )
                ->get($type),
        );

        return view('pulverizers.show', [
            'pulverizer' => $pulverizer,
            'type' => $type,
        ]);
    }
}
