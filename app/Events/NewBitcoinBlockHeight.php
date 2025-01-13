<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;

class NewBitcoinBlockHeight
{
    use Dispatchable;

    public function __construct(public int $height) {}
}
