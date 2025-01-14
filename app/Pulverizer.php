<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\Str;

class Pulverizer
{
    public string $type;

    public string $inscription_id;

    public string $owner;

    public string $buyer_twitter_handle;

    public string $hex_color;

    public int $recharge_period_in_weeks;

    protected bool $is_recharging;

    protected string $status;

    protected array $triggered_blockheights = [];

    public function __construct(string $type, array $attributes = [])
    {
        $this->type = $type;

        foreach ($attributes as $key => $value) {
            if (property_exists($this, $key)) {
                $this->{$key} = $value;
            }
        }
    }

    public function lastBlockHeightTriggered(): ?int
    {
        $blocks = Collection::make($this->triggered_blockheights);

        if ($blocks->isEmpty()) {
            return null;
        }

        return (int) $blocks->max();
    }

    public function rechargedAtBlockHeight(): ?int
    {
        $lastBlockTriggered = $this->lastBlockHeightTriggered();

        if ($lastBlockTriggered) {
            return $lastBlockTriggered + 72 + ($this->recharge_period_in_weeks * 1008);
        }

        return null;
    }

    public function canBeTriggered(): bool
    {
        if ($this->isActive() || $this->isRecharging()) {
            return false;
        }

        return true;
    }

    public function detonatesAtBlock(): int
    {
        return $this->lastBlockHeightTriggered() + 72;
    }

    public function isActive(): bool
    {
        return $this->status === 'active';
    }

    public function isRecharging(): bool
    {
        return $this->is_recharging;
    }

    public function name(): string
    {
        return Str::of($this->type)
            ->ucfirst()
            ->append(' ')
            ->append('Pineapple Pulverizer')
            ->toString();
    }

    public function status(): string
    {
        return $this->status;
    }

    public function timesTriggered(): int
    {
        return Collection::make($this->triggered_blockheights)->count();
    }
}
