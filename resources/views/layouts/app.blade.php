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
    <body class="antialiased">
        @include('googletagmanager::body')
        <div class="bg-gradient-to-b from-white to-yellow-200">
            <nav class="absolute inset-x-0 top-0 px-6 pt-4 md:px-8 md:py-4 z-20">
                {{-- Desktop nav --}}
                <div class="hidden md:flex justify-between">
                    <a href="/" class="text-5xl block text-yellow-400 text-shadow font-mono">AKCIA</a>
                    <ul class="slab flex text-3xl space-x-4 lg:space-x-8 lg:text-4xl text-gray-400 mt-2">
                        <li>Aktéri</li>
                        <li>Pridané</li>
                        <li>Texty</li>
                        <li>Prečo</li>
                    </ul>
                    <a href="/" class="text-5xl block text-yellow-400 text-shadow font-mono">ZET</a>
                </div>

                {{-- Mobile nav --}}
                <div class="md:hidden">
                    <div class="relative flex justify-between">
                        <a href="/" class="text-5xl block text-yellow-400 text-shadow font-mono">A*Z</a>
                        <svg viewBox="0 0 100 120" width="40" height="40" class="inline-block fill-current text-yellow-400 text-5xl mt-3" style="filter: drop-shadow(0.04em -0.02em 0 #ce4369)">
                            <rect width="100" height="8"></rect>
                            <rect y="40" width="100" height="8"></rect>
                            <rect y="80" width="100" height="8"></rect>
                        </svg>
                    </div>
                </div>
            </nav>

            {{ $slot }}
        </div>
    </body>
</html>
