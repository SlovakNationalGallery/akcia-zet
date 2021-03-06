<html lang="sk">

<head>
  @include('googletagmanager::head')
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Akcia ZET — umenovedná výprava</title>
  <meta name="description" content="Umenie × propaganda, hoax, kult osobnosti a iné dôležité témy v podcastoch, videách, článkoch a ďalších formátoch">
  <meta property="og:title" content="Akcia ZET — umenovedná výprava" />
  <meta property="og:description" content="Umenie × propaganda, hoax, kult osobnosti a iné dôležité témy v podcastoch, videách, článkoch a ďalších formátoch" />
  <meta property="og:type" content="website" />
  <meta property="og:url" content="https://akciazet.sng.sk/" />
  <meta property="og:image" content="https://akciazet.sng.sk/img/og_image.png" />
  <link rel="stylesheet" href="/css/landing.css">
  <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
</head>

<body class="font-serif antialiased bg-gradient-to-r-slanted from-gray-800 to-red-900">
  @include('googletagmanager::body')
  <div class="relative min-h-96 text-yellow-400">
    <div id="openseadragon1" class="absolute inset-0"></div>
    <div class="relative py-24 xl:py-32 flex justify-center items-center uppercase">
      <h1 class="text-8xl xl:text-9xl font-mono text-center leading-relaxed tracking-wider" x-data="scrambledTitle()" x-html="scrambledTitle.replace(' ', '<br>')"></h1>
      <h2 class="absolute text-xl xl:text-3xl font-bold text-center tracking-widest mt-4 mx-auto my-auto">Umenovedná&nbsp;výprava</h3>
    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current absolute w-5 top-0 right-0 m-8">
      <path d="M10.684 10.684h7.945v3.29h-6.577v1.369h6.577v3.288h-7.945v-7.947zm0-8.349l6.979 6.98h-6.979v-6.98zm-9.316-.967h7.948v7.947H1.368V1.368zm10.285 0h6.976v6.981l-6.976-6.981zM0 0v10.684h9.316v7.947H1.368v-6.579H0V20h20V0H0z" />
    </svg>
  </div>
  <div class="container xl:text-shadow mx-auto py-8 px-8 sm:w-3/4 xl:w-1/2 overflow-hidden">
    <div class="text-center text-yellow-200 font-bold uppercase">
      <p class="text-m xl:text-xl xl:mt-6 leading-relaxed tracking-wider">
        Vydávame sa na niekoľkomesačnú vzrušujúcu umenovednú výpravu,
        na&nbsp;ktorej otvoríme dôležité a&nbsp;aktuálne témy
      </p>

      <ul class="text-xl xl:text-3xl mt-8 tracking-widest text-shadow-none">
        <li class="my-6 xl:my-2">umenie × propaganda</li>
        <li class="my-6 xl:my-2">hoax</li>
        <li class="my-6 xl:my-2">kult osobnosti</li>
        <li class="my-6 xl:my-2">originál × kópia</li>
        <li class="my-6 xl:my-2">monumentálna maľba</li>
        <li class="my-6 xl:my-2">umenie na zakázku</li>
        <li class="my-6 xl:my-2">a mnoho ďalších.</li>
      </ul>

      <p class="text-m xl:text-xl mt-10 leading-relaxed tracking-wider">
        Pripravované videá, prednášky, diskusie, články, audio podcasty,
        a&nbsp;ďalšie formáty na tieto témy budete môcť už onedlho sledovať
        práve tu.
      </p>

      <a class="inline-block mt-12 mb-10 py-4 px-6 bg-yellow-400 hover:bg-yellow-300 active:bg-yellow-200 focus:outline-none focus:shadow-outline text-pink-400 text-xl xl:text-xl text-shadow-none tracking-wider rounded-2xl" href="https://sng.us3.list-manage.com/subscribe?u=0836676badd21fd175052c757&id=5839efcae6&group%5B9800%5D%5B32%5D=true">
        Prihláste sa do nášho newslettera!
      </a>
    </div>
  </div>


  <script>
    function pickRandom(array) {
      return array[Math.floor(Math.random() * array.length)]
    }

    const titleVariants = [
      '*k*i* ze*',
      '**ci* ze*',
      '**cia ***',
      'ak**a ***',
      '*k*ia ***',
      '**c** *et',
      'a*c** *e*',
      '*k**a **t',
      '**c*a z**',
      'a**i* ***',
      '**ci* **t',
      '****a zet',
    ]

    function scrambledTitle() {
      return {
        scrambledTitle: pickRandom(titleVariants).toUpperCase()
      }
    }
  </script>

  <!-- Loading background image -->
  <script src="https://cdn.jsdelivr.net/npm/openseadragon@2.4/build/openseadragon/openseadragon.min.js"></script>
  <script type="text/javascript">
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
      // defaultZoomLevel: 12, //TODO make zoom level responsive
      defaultZoomLevel: 5,
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
</body>

</html>
