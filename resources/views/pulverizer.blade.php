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
        <x-navbar/>

        <main class="mt-12 flex justify-center">
            @svg('pulverizers.'.$type, [
                'class' => 'w-96 border rounded-md animate-shake',
                'title' => Str::of($type)->ucfirst()->append(' ')->append('Pizza Pet Pulverizer')->toString(),
            ])
        </main>

        <div class="mt-4 text-xl font-game text-center font-semibold leading-6 text-orange-100">
            WHEN WILL IT BLOW UP?
        </div>

        <div class="mt-8 flex justify-center text-xs text-center font-semibold leading-6 text-orange-900">
            <a href="https://x.com/ninja5_pizza" class="flex flex-col justify-center items-center gap-x-2 hover:text-orange-100" target="_blank" rel="noopener">
                <p>FOLLOW THE NINJA5</p>
                <x-icon-twitter-x class="mt-1 w-8"/>
            </a>
        </div>

        <x-footer/>

        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>
