<?php

namespace App\Console\Commands;

use App\Events\NewBitcoinBlockHeight;
use App\Jobs\CacheBitcoinBlockHeight;
use Illuminate\Console\Command;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;

class CacheBitcoinBlockHeightCommand extends Command
{
    protected $signature = 'bitcoin:cache-height';

    protected $description = 'Cache the Bitcoin block height';

    private int $currentHeight;

    public function __construct()
    {
        parent::__construct();

        $this->currentHeight = Collection::make(
            Cache::get('bitcoin_block_height', default: [])
        )
            ->get('height', default: 0);
    }

    public function handle()
    {
        CacheBitcoinBlockHeight::dispatchSync();

        $height = Collection::make(
            Cache::get('bitcoin_block_height', default: [])
        )
            ->get('height', default: 'unknown');

        NewBitcoinBlockHeight::dispatchIf(
            $height > $this->currentHeight,
            $height
        );

        $this->info('The current Bitcoin block height is '.$height);
    }
}
