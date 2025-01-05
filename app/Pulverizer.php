<?php

namespace App;

use Illuminate\Support\Str;

class Pulverizer
{
    public string $type;

    public string $inscription_id;

    public string $owner;

    public string $buyer_twitter_handle;

    public string $hex_color;

    public int $recharge_period_in_weeks;

    public bool $is_recharging;

    public string $status;

    public function __construct(string $type, array $attributes = [])
    {
        $this->type = $type;

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
        return Str::of($this->type)
            ->append(' ')
            ->append('Pineapple Pulverizer')
            ->toString();
    }
}
