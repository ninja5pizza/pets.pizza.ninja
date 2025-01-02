<?php

namespace App\View\Components;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Http;

class Statistics extends Component
{
    public int $dead_count;
    public int $alive_count;
    public int $owner_count;
    public int $listed_for_sale;

    public function __construct()
    {
        $response = Http::acceptJson()
            ->get('https://ninja5.pizza/api/stats/pizza-pets');

        if ($response->successful()) {
            $this->dead_count = $response->json('dead_count');
            $this->alive_count = $response->json('alive_count');
            $this->owner_count = $response->json('owner_count');
            $this->listed_for_sale = $response->json('listed_for_sale');
        }
    }

    public function render(): View
    {
        return view('components.statistics');
    }
}
