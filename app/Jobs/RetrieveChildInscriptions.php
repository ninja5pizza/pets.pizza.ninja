<?php

namespace App\Jobs;

use App\Models\Inscription;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class RetrieveChildInscriptions implements ShouldQueue
{
    use Queueable;

    public $tries = 3;

    public $backoff = 5;

    private string $apiUrl;

    private Inscription $parent;

    public function __construct(protected string $inscription_id, protected int $page = 0)
    {
        $this->apiUrl = Str::of('https://ordiscan.com/r/children/')
            ->append($this->inscription_id)
            ->append('/inscriptions/')
            ->append($this->page)
            ->toString();

        $this->parent = Inscription::where('inscription_id', $this->inscription_id)->first();
    }

    public function handle(): void
    {
        if (! $this->parent) {
            return;
        }

        $response = Http::acceptJson()
            ->get($this->apiUrl);

        if ($response->successful()) {
            $this->processChildren(
                $response->json('children')
            );
        }

        if ($response->failed()) {
            $this->fail();
        }
    }

    protected function processChildren(array $children)
    {
        Collection::make($children)->each(function ($item) {
            if (! Inscription::where('inscription_id', $item['id'])->exists()) {
                Inscription::create([
                    'parent_id' => $this->parent->id,
                    'inscription_id' => $item['id'],
                    'created_at_block' => $item['height'],
                    'created_at' => Carbon::createFromTimestamp($item['timestamp']),
                ]);
            }
        });
    }
}
