<?php

namespace App;

use Illuminate\Support\Str;

class Pulverizer
{
    public string $key;

    public string $inscription_id;

    public string $owner;

    public string $buyer_twitter_handle;

    public string $hex_color;

    public int $recharge_period_in_weeks;

    public bool $is_recharging;

    public string $status;

    public function __construct(string $key, array $attributes = [])
    {
        $this->key = $key;

        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function name(): string
    {
        return Str::of($this->key)
            ->append(' ')
            ->append('Pineapple Pulverizer')
            ->toString();
    }
}
