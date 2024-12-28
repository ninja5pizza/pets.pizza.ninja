<div
    id="trading-view-charts"
    @class([
        'w-full',
        'h-96',
        'border-t',
        'border-neutral-900',
        $attributes->get('class')
    ])
>
</div>

@pushOnce('scripts')
    @vite('resources/js/chart.js')
@endPushOnce
