<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PIZZA PETS | PULVERIZER | {{ Str::upper($type) }}</title>
        <meta name="description" content="The {{ $type }} pulverizer destroys all Pizza Pets with weakness {{ $type }} pineapple!">

        <meta property="og:url" content="{{ url()->full() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="PIZZA PETS | PULVERIZER | {{ Str::upper($type) }}">
        <meta property="og:description" content="The {{ $type }} pulverizer destroys all Pizza Pets with weakness {{ $type }} pineapple!">
        <meta property="og:image" content="{{ cdn_asset('opengraph/pizza_pets/pulverizer-'.$type.'-twitter-card-large.png') }}">

        <meta property="twitter:domain" content="pets.pizza.ninja">
        <meta property="twitter:url" content="{{ url()->full() }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="PIZZA PETS | PULVERIZER | {{ Str::upper($type) }}">
        <meta name="twitter:image" content="{{ cdn_asset('opengraph/pizza_pets/pulverizer-'.$type.'-twitter-card-large.png') }}">

        <link rel="preconnect" href="https://rsms.me/">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <link rel="preconnect" href="{{ cdn_asset('/') }}">
        <link rel="preload" href="{{ cdn_asset('fonts/homevideo_regular.ttf') }}" as="font" type="font/ttf" crossorigin>

        <x-layout.head.favicons/>

        @vite('resources/css/app.css')

        @if(config('services.fathom.site_id'))
        <script src="https://cdn.usefathom.com/script.js" data-site="{{ config('services.fathom.site_id') }}" defer></script>
        @endif
    </head>
    <body class="bg-pizza-orange">
        <div id="#app">
            <x-navbar/>

            <main class="mt-12 flex justify-center">
                @svg('pulverizers.'.$type, [
                    'class' => 'w-96 border rounded-md'
                        . ($pulverizer->isActive() ? ' animate-shake' : ''),
                    'title' => $pulverizer->name(),
                ])
            </main>

            <div class="mt-4 text-xl font-game text-center font-semibold leading-6 text-orange-100">
                WHEN WILL IT BLOW UP?
            </div>

            <div class="mt-8 text-xl font-game text-center font-semibold leading-6 text-orange-100">
                {{ $pulverizer->status() }} NOW
                @if($pulverizer->isRecharging())
                ... RECHARGING
                @endif
            </div>

            @if($pulverizer->lastBlockHeightTriggered() === NULL)
                <div class="mt-1 text-2l font-game text-center font-semibold leading-6 text-orange-200">
                    NOT BEEN TRIGGERED YET
                </div>
            @else
                <div class="mt-1 text-base font-game text-center font-semibold leading-6 text-orange-200">
                    LAST TRIGGERED AT BLOCK {{ $pulverizer->lastBlockHeightTriggered() }}
                </div>
            @endif

            @if($pulverizer->isActive())
            <div class="mt-1 text-xl font-game text-center font-bold leading-6 text-orange-100">
                    DETONATES AT BLOCK {{ $pulverizer->detonatesAtBlock() }}
            </div>
            <div class="mt-8 pt-2 pb-4 border-t bg-off-white text-center">
                <div class="text-xs leading-6 text-orange-900">APPLY LOTION FROM BLOCK</div>
                <div class="text-4xl font-game font-semibold leading-6 text-orange-900">{{ $pulverizer->lotionPetAtBlock() }}</div>

                <div class="mt-2 text-xs leading-6 text-orange-900">CURRRENT BLOCK</div>
                <div class="text-4xl font-game font-semibold leading-6 text-orange-900">{{ $blockheight }}</div>
            </div>
            @endif

            @if($pulverizer->isRecharging())
            <div class="mt-8 pt-2 pb-4 border-t bg-off-white text-center">
                <div class="text-xs leading-6 text-orange-900">RECHARGED AT BLOCK</div>
                <div class="text-4xl font-game font-semibold leading-6 text-orange-900">{{ $pulverizer->rechargedAtBlockHeight() }}</div>

                <div class="mt-2 text-xs leading-6 text-orange-900">CURRRENT BLOCK</div>
                <div class="text-4xl font-game font-semibold leading-6 text-orange-900">{{ $blockheight }}</div>

                <div class="mt-2 text-xs leading-6 text-orange-900">BLOCKS REMAINING FOR RECHARGE</div>
                <div class="text-4xl font-game font-semibold leading-6 text-orange-900">{{ $pulverizer->rechargedAtBlockHeight() - $blockheight }}</div>
            </div>
            @endif

            <x-footer/>
        </div>

        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>
