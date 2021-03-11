<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('googletagmanager::head')
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Umenie × propaganda, hoax, kult osobnosti a iné dôležité témy v podcastoch, videách, článkoch a ďalších formátoch">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta property="og:title" content="Akcia ZET — umenovedná výprava" />
        <meta property="og:description" content="Umenie × propaganda, hoax, kult osobnosti a iné dôležité témy v podcastoch, videách, článkoch a ďalších formátoch" />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="https://akciazet.sng.sk/" />
        <meta property="og:image" content="https://akciazet.sng.sk/img/og_image.png" />
        <title>Akcia ZET — umenovedná výprava</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        <x-embed-styles />

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="antialiased bg-gray-800">
        @include('googletagmanager::body')
        {{ $slot }}
    </body>
</html>
