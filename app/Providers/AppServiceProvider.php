<?php

namespace App\Providers;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        $blockheight = Collection::make(
            Cache::get('bitcoin_block_height', default: [])
        )
            ->get('height', default: 'unknown');

        View::share('blockheight', $blockheight);
    }
}
