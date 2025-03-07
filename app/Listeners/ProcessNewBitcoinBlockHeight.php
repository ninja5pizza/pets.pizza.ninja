<?php

namespace App\Listeners;

use App\Events\NewBitcoinBlockHeight;
use App\Jobs\RetrieveChildInscriptions;

class ProcessNewBitcoinBlockHeight
{
    public function handle(NewBitcoinBlockHeight $event): void
    {
        foreach (config('pulverizers') as $type => $value) {
            $pulverizer = pulverizer($type, $value);

            if (! $pulverizer->canBeTriggered()) {
                continue;
            }

            RetrieveChildInscriptions::dispatch($pulverizer->inscription_id)
                ->delay(now()->addMinute());
        }
    }
}
