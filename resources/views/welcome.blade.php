<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pizza.Pets.Ninja</title>

        <link rel="preconnect" href="https://rsms.me/">
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

        <meta property="og:url" content="{{ url()->full() }}">
        <meta property="og:type" content="website">
        <meta property="og:title" content="PIZZA PETS">
        <meta property="og:description" content="Feed your pets!">
        <meta property="og:image" content="{{ cdn_asset('opengraph/pizza_pets/default-twitter-card-large.png') }}">

        <meta property="twitter:domain" content="pets.pizza.ninja">
        <meta property="twitter:url" content="{{ url()->full() }}">
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="PPIZZA PETS">
        <meta name="twitter:image" content="{{ cdn_asset('opengraph/pizza_pets/default-twitter-card-large.png') }}">

        @vite('resources/css/app.css')
    </head>
    <body class="bg-pizza-orange">
        <main class="w-full mt-64 mb-72 flex flex-col items-center" aria-labelledby="pizza-pets-heading">
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
    </body>
</html>
