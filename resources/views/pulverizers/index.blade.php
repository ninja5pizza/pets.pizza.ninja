<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>PIZZA PETS | PULVERIZERS</title>
        <meta name="description" content="Pizza Pets Pulverizers can detonate anytime, destroying all Pets with their according pineapple weakness!">

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

            <x-footer/>
        </div>

        @vite('resources/js/app.js')
        @stack('scripts')
    </body>
</html>
