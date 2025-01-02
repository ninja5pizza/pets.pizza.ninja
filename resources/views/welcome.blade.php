<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PIZZA PETS</title>
        <meta name="description" content="Bitcoin's first digital pet. Feed it or it dies forever!">

        <meta property="og:url" content="{{ url()->full() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="PIZZA PETS">
        <meta property="og:description" content="Bitcoin's first digital pet. Feed it or it dies forever!">
        <meta property="og:image" content="{{ cdn_asset('opengraph/pizza_pets/default-twitter-card-large.png') }}">

        <meta property="twitter:domain" content="pets.pizza.ninja">
        <meta property="twitter:url" content="{{ url()->full() }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="PIZZA PETS">
        <meta name="twitter:image" content="{{ cdn_asset('opengraph/pizza_pets/default-twitter-card-large.png') }}">

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
        <main class="w-full mt-36 mb-24 flex flex-col items-center" aria-labelledby="pizza-pets-heading">
            <h2 id="pizza-pets-heading" class="sr-only">Pizza Pets</h2>
            <div class="relative w-full">
                <a href="https://pizzapets.fun" target="_blank" rel="noopener">
                    <img
                        src="{{ cdn_asset('images/pizza_pets/logo.png') }}"
                        alt="Pizza Pets" width="377" height="318"
                        class="absolute -top-12 left-1/2 transform -translate-x-1/2"
                    >
                </a>
                <div id="bg-pets-striped" class="w-full">
                    <div class="h-10 bg-pets-orange-100"></div>
                    <div class="h-10 bg-pets-orange-200"></div>
                    <div class="h-10 bg-pets-orange-300"></div>
                    <div class="h-10 bg-pets-orange-400"></div>
                    <div class="h-10 bg-pets-orange-500"></div>
                    <div class="h-10 bg-pets-orange-600"></div>
                </div>
            </div>
        </main>

        <section class="ml-6 flex justify-center items-center font-game text-2xl md:text-4xl font-semibold leading-6 text-orange-100">
            <a
                class="hover:text-white"
                href="https://pizzapets.fun"
            >
                feed your pets
            </a>
            <a
                class="hover:text-white"
                href="https://pizzapets.fun"
            >
                <div class="ml-6 animate-bounce-right" aria-hidden="true">→</div>
            </a>
        </section>

        <div class="mt-32 p-2 flex items-center justify-center bg-orange-900 font-game text-orange-600">
            PIZZA PETS FLOORPRICE
        </div>

        <x-chart class="mb-64"/>

        <x-footer/>

        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>
