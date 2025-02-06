<?php

namespace App;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
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

    public function currentBlockHeight(): ?int
    {
        return Collection::make(
            Cache::get('bitcoin_block_height', default: [])
        )
            ->get('height');
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

    public function lotionPetAtBlock(): int
    {
        return $this->lastBlockHeightTriggered() + 36;
    }

    public function detonatesAtBlock(): ?int
    {
        return ($this->lastBlockHeightTriggered() === null)
            ? null
            : $this->lastBlockHeightTriggered() + 72;
    }

    public function isActive(): bool
    {
        $detonatesAt = $this->detonatesAtBlock();
        $currentHeight = $this->currentBlockHeight();

        if ($detonatesAt !== null && $currentHeight !== null) {
            return $detonatesAt > $currentHeight;
        }

        return false;
    }

    public function isRecharging(): bool
    {
        if ($this->isActive()) {
            return false;
        }

        if ($this->rechargedAtBlockHeight() > $this->currentBlockHeight()) {
            return true;
        }

        return false;
    }

    public function blocksRemainingToRecharge(): int
    {
        $rechargedAt = $this->rechargedAtBlockHeight();
        $current = $this->currentBlockHeight();

        if ($rechargedAt === null || $current === null) {
            return 0;
        }

        return max(0, $rechargedAt - $current);
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
        if ($this->isActive()) {
            return 'active';
        }

        return 'inactive';
    }

    public function timesTriggered(): int
    {
        return Collection::make($this->triggered_blockheights)->count();
    }
}
