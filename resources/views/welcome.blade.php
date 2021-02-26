<x-app-layout>
  <div class="bg-gradient-to-r-260 from-red-800 to-gray-400">

    <nav class="absolute inset-x-0 top-0 px-4 pt-4 md:static md:px-8 md:py-4 md:bg-gradient-to-r-270 from-red-800 to-gray-700 z-10">
        {{-- Desktop nav --}}
        <div class="hidden md:flex justify-between">
            <a href="/" class="text-5xl block text-yellow-400 text-shadow font-mono">AKCIA</a>
            <ul class="slab flex space-x-8 md:text-4xl sm:text-2xl text-gray-400 mt-2">
                <li>Aktéri</li>
                <li>Pridané</li>
                <li>Texty</li>
                <li>Prečo</li>
            </ul>
            <a href="/" class="text-5xl block text-yellow-400 text-shadow font-mono">ZET</a>
        </div>

        {{-- Mobile nav --}}
        <div class="md:hidden">
            {{-- shader --}}
            <div class="absolute inset-0 opacity-40 bg-gradient-to-b from-black to-transparent"></div>
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
    <div
        x-data="{
            dates: {{ json_encode($timelapseImagesDates->map->timestamp) }},
            flickity: null,
            init(dispatch) {
                this.flickity = Timelapse.initFlickity(this.$refs.carousel, this.dates.length - 1)
                Timelapse.initSlider(this.$refs.slider, this.dates, dispatch)

                this.$refs.slider
                    .querySelector('[data-handle] > div')
                    .appendChild(this.$refs.handle)
            }
        }"
        x-init="init($dispatch)"
        x-on:resize.window.debounce="flickity.resize()"
        x-on:slider-change="flickity.select(dates.indexOf($event.detail))"
    >
        <div class="main-carousel h-1/2-screen md:h-3/4-screen xoverflow-hidden" x-ref="carousel">
            @foreach ($timelapseImages as $image)
                <div class="carousel-cell w-full h-full">
                    <img
                        data-flickity-lazyload-srcset="{{ $image->getSrcset() }}"
                        data-flickity-lazyload-src="{{ $image->getUrl() }}"
                        sizes="1px" {{-- Initial size updated in JS --}}
                        class="object-cover object-center h-full w-full"
                    >
                </div>
            @endforeach
        </div>
        <div x-ref="slider"></div>
        <svg x-ref="handle" x-cloak xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512.01 512.01" class="fill-current text-yellow-200 w-12 hover:text-yellow-300 filter-shadow">
            <path d="M507.804,200.28L262.471,12.866c-3.84-2.923-9.131-2.923-12.949,0L4.188,200.28c-3.605,2.773-5.077,7.531-3.648,11.84
                        l93.717,281.92c1.451,4.373,5.525,7.296,10.133,7.296h303.253c4.587,0,8.683-2.944,10.133-7.296l93.717-281.92
                        C512.882,207.789,511.41,203.053,507.804,200.28z"/>
        </svg>
    </div>
    <div class="container text-center mx-auto md:w-1/2 py-8">
        <p class="uppercase font-serif font-bold text-white leading-relaxed tracking-wider px-6">
            Vydávame sa na niekoľkomesačnú vzrušujúcu umenovednú výpravu,
            na&nbsp;ktorej otvoríme dôležité a&nbsp;aktuálne témy
        </p>
        <a href="/o-projekte" class="mt-4 slab inline-block text-gray-400 underline">O projekte</a>
    </div>
  </div>

  @php
    //   TODO
   $article = $articles[0]    ;
  @endphp
  <h2 class="pt-4 -mb-5 tracking-wide font-serif font-bold uppercase text-center text-6xl md:text-7xl text-gray-500">Pridané</h2>
  <div class="relative px-8 bg-gradient-to-r-334 from-red-800 to-gray-700 text-center"
    x-data="calculateCutoutPolygon($el, 'hr')"
    x-on:resize.window.debounce="polygonPoints = calculateCutoutPolygon($el, 'hr').polygonPoints"
    :style="`clip-path: polygon(${polygonPoints.join(',')})`"
    >
    <h3 class="text-2xl  md:text-3xl font-serif text-yellow-400 font-bold uppercase tracking-wider py-6 md:py-8">{{ $article->title }}</h3>
    <div class="md:w-1/2 mx-auto md:flex gap-12">
        @if($article->embed_url)
            <div class="-mx-8 md:text-right md:w-1/2">
                <x-extended-embed url="{{ $article->embed_url }}" />
            </div>
        @endif
        <div class="md:w-1/2 mx-auto">
            <p class="text-sm text-gray-400 my-5">
                {{ ucfirst($article->published_at->diffForHumans()) }}
            </p>
            <p class="text-sm text-white">
                {{ $article->perex }}
            </p>

            <div class="mt-4">
                @foreach($article->tags as $tag)
                  <a href="#" class="text-pink-400 mr-1">#{{ $tag->name }}</a>
                @endforeach
            </div>
        </div>
    </div>

    <div class="text-left text-sm md:text-center md:flex md:gap-12 md:max-w-5xl md:mx-auto">
        @foreach([...$articles, $articles[0]] as $article)
            <div class="md:w-1/3">
                <hr class="my-6 md:mt-12 md:mx-6 border-t-3 border-transparent">
                <p class="text-gray-400 mt-4">
                    {{ ucfirst($article->published_at->diffForHumans()) }}
                </p>
                <div class="grid grid-cols-{{ $article->embed_url ? '2' : '1' }} gap-4 mt-2">
                    @if($article->embed_url)
                    <div>
                        <x-extended-embed url="{{ $article->embed_url }}" />
                    </div>
                    @endif
                    <h3 class="text-lg text-yellow-200 slab {{ $article->embed_url ? 'md:text-left' : ''}}"><a href="#TODO">{{ $article->title }}</a></h3>
                </div>
                <p class="text-white mt-2">
                    {{ $article->perex }}
                </p>
                <div class="mt-2">
                    @foreach($article->tags as $tag)
                        <a href="#" class="text-pink-400 mr-1">#{{ $tag->name }}</a>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>

    <a href="/pridane" class="my-8 slab inline-block text-gray-400 underline">Všetky príspevky</a>
  </div>

  <h2 class="pt-4 -mb-5 tracking-wide font-serif font-bold uppercase text-center text-6xl md:text-7xl text-gray-500">Texty</h2>
  <div
    class="relative px-8 bg-gradient-to-r-252 from-red-800 to-gray-700 text-center py-8"
    x-data="calculateCutoutPolygon($el, '.cutout')"
    x-on:resize.window.debounce="polygonPoints = calculateCutoutPolygon($el, '.cutout').polygonPoints"
    :style="`clip-path: polygon(${polygonPoints.join(',')})`"
    >
      <div class="md:flex md:max-w-5xl mx-auto">
        <div class="md:text-left md:flex md:w-1/2">
            <div class="hidden md:w-1/3 md:block mr-8 mt-8">
                <img src="https://placekitten.com/100/100" class="object-cover w-40 mx-auto my-4">
            </div>
            <div class="md:w-2/3">
                <h5 class="text-sm text-gray-400">Pripravujeme</h5>
                <h3 class="slab text-2xl  md:text-3xl text-white mt-2">Stratený svätý</h3>
                <h4 class="slab text-yellow-200 mt-2 hidden md:block w-3/4">S. Kusá a O. Chrobák v komixe o pátraní po stratenom obraze</h4>
                <img src="https://placekitten.com/100/100" class="object-cover w-40 mx-auto my-4 md:hidden">
                <p class="text-sm text-white mt-4 md:w-3/4">Krátka beseda o tom, čo sú hoaxy, na čo sú dobré a čím sa líšía hoaxy dneška od včerajších hoaxov.</p>
            </div>
            <hr class="my-6 border-t-2 border-gray-300 md:hidden cutout">
        </div>
        <div class="relative top-4 bottom-4 cutout hidden md:block" style="width:2px"></div>
        <div class="md:w-1/2">
            <div class="md:w-1/2 mx-auto">
                <h5 class="text-sm text-gray-400">Prvýkrát zverejnené</h5>
                <h3 class="slab text-2xl md:text-3xl text-white mt-2">Výskum</h3>
                <h4 class="slab text-yellow-200 mt-2 hidden md:block">Markéta Peringerová v komixe o pátraní po stratenom obraze</h4>
                <img src="https://placekitten.com/100/100" class="object-cover w-40 mx-auto my-4 md:hidden">
                <p class="text-center text-sm text-white mt-4">Krátka beseda o tom, čo sú hoaxy, na čo sú dobré a čím sa líšía hoaxy dneška od včerajších hoaxov.</p>
            </div>
        </div>
    </div>
  </div>
</x-app-layout>
