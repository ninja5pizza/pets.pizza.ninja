<?php

namespace App\Listeners;

use App\Events\NewBitcoinBlockHeight;
use App\Jobs\RetrieveChildInscriptions;

class ProcessNewBitcoinBlockHeight
{
    public function handle(NewBitcoinBlockHeight $event): void
    {
        foreach(config('pulverizers') as $type => $value) {
            $pulverizer = pulverizer($type, $value);

            RetrieveChildInscriptions::dispatch($pulverizer->inscription_id);
        }
    }
}
