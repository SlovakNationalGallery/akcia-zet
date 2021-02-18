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
        <div id="openseadragon1" class="fixed inset-0"></div>
        <div class="relative">
        {{ $slot }}
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/openseadragon@2.4/build/openseadragon/openseadragon.min.js"></script>
    <script type="text/javascript">
        function pickRandom(array) {
          return array[Math.floor(Math.random() * array.length)]
        }
        const tileSource = new OpenSeadragon.DziTileSource(
        12250, 13337, 256, 0,
        'https://img.webumenia.sk/zoom/?path=%2FVystavy%2Fakciazet%2Fjp2%2Fakciazet.jp2_files/',
        'jpg',
        )

        const destinations = [
        // Laser
        new OpenSeadragon.Point(0.8076468355747288, 0.8559183262179595),
        // Basket and laser
        new OpenSeadragon.Point(0.842960994906955, 0.8255290402730286),
        // Basket
        new OpenSeadragon.Point(0.8328838529685686, 0.727800779243577),
        // Kid
        new OpenSeadragon.Point(0.9004653202226491, 0.6406824684652968),
        // Flowers, steps
        new OpenSeadragon.Point(0.3631640732536106, 0.8829698372826646),
        // Vase
        new OpenSeadragon.Point(0.15148269401970513, 0.9554515575399319),
        // Elderly
        new OpenSeadragon.Point(0.13, 0.6637986366888344),
        ]

        var viewer = OpenSeadragon({
            id: "openseadragon1",
            showNavigationControl: false,
            mouseNavEnabled: false,
            defaultZoomLevel: 12,
            minPixelRatio: 1,
            tileSources: tileSource,
            immediateRender: true,
        })

        viewer.addHandler('open', function () {
        viewer.viewport.panTo(pickRandom(destinations), true);
        })
        viewer.addHandler('pan', function () {
        // Utility for setting destinations
        // console.log(viewer.viewport.getCenter());
        })
    </script>
</html>
