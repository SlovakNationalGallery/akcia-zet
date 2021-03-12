<x-app-layout>
    <div class="fixed inset-0 bg-gray-800" x-data id="openseaviewer" x-init="initOpenSeaDragon($el.id)">
    </div>
    <div class="relative">
        {{-- Solid colour for md+ --}}
        <div class="nav-spacer hidden md:block md:bg-gradient-to-r-270 md:from-red-800 md:to-gray-700 md:opacity-100"></div>
        {{-- Background overlay shadow for mobile --}}
        <div class="absolute md:hidden inset-x-0 h-20 z-10 opacity-40 bg-gradient-to-b from-black to-transparent"></div>
        <div class="bg-gradient-to-r-260 from-red-800 to-gray-700">
            <div
                x-data="{
                    dates: {{ json_encode($timelapseImagesDates->map->timestamp) }},
                    flickity: null,
                    sliderCssClasses: {
                        target: 'target bg-gray-400 border-0 rounded-none shadow-none h-3',
                        connect: 'connect bg-yellow-400',
                        connects: 'connects rounded-none',
                        handle: ' absolute w-12 -right-6 -top-5 focus:outline-none',
                        active: '',
                        tooltip: ' absolute transform left-1/2 -translate-x-1/2 font-mono text-yellow-200 mt-2 text-2xl',
                    },
                    init(dispatch) {
                        this.flickity = Timelapse.initFlickity(this.$refs.carousel, this.dates.length - 1)
                        Timelapse.initSlider(this.$refs.slider, this.dates, this.sliderCssClasses, dispatch)

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
                <div class="hidden md:flex justify-between px-8 mt-6 font-mono text-2xl">
                    <div class="text-yellow-400">11/20</div>
                    <div class="text-gray-400">6/21</div>
                </div>
            </div>
            <div class="container text-center mx-auto md:max-w-screen-md py-8 pt-16 md:pt-8 ">
                <p class="text-xl slab text-white leading-relaxed tracking-wider px-6">
                    Vydávame sa na niekoľkomesačnú vzrušujúcu umenovednú výpravu,
                    na&nbsp;ktorej otvoríme dôležité a&nbsp;aktuálne témy
                </p>
                <h3 class="text-center mt-4 mb-8 slab text-xl">
                    <a href="/o-projekte" class="tracking-wider text-gray-400 underline">O projekte</a>
                </h3>
            </div>
        </div>
        <h2 class="pt-4 -mb-5 md:-mb-8 tracking-wide font-serif font-bold uppercase text-center text-6xl md:text-8xl text-gray-500">Pridané</h2>
        <div class="relative p-8 bg-gradient-to-r-334 from-red-800 to-gray-700 text-center"
            x-data="calculateCutoutPolygon($el, 'hr')"
            x-on:resize.window.debounce="polygonPoints = calculateCutoutPolygon($el, 'hr').polygonPoints"
            :style="`clip-path: polygon(${polygonPoints.join(',')})`"
            >
            <h3 class="text-2xl  md:text-3xl font-serif text-yellow-400 font-bold uppercase tracking-wider py-6 md:py-8">
                <a href="{{ route('articles.show', $featuredArticle)}}">{{ $featuredArticle->title }}</a>
            </h3>
            <div class="md:w-1/2 mx-auto md:flex gap-12">
                @if($featuredArticle->embed_url)
                    <div class="-mx-8 md:text-right md:w-1/2">
                        <x-extended-embed url="{{ $featuredArticle->embed_url }}" />
                    </div>
                @endif
                <div class="md:w-1/2 mx-auto">
                    <p class="text-sm text-gray-400 my-5">
                        {{ ucfirst($featuredArticle->published_at->diffForHumans()) }}
                    </p>
                    <p class="text-sm text-white">
                        {{ $featuredArticle->perex }}
                    </p>

                    <div class="mt-4">
                        @foreach($featuredArticle->tags as $tag)
                        <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="text-pink-400 mr-1">#{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="text-left text-sm md:text-center md:flex md:gap-12 md:max-w-5xl md:mx-auto">
                @foreach($articles as $article)
                    <div class="md:w-1/3">
                        <hr class="my-6 md:mt-12 md:mx-6 border-t-3 border-transparent">
                        <x-article-preview :article="$article" class="mt-4" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-center mt-8 slab text-xl">
                <a href="{{ route('articles.index') }}" class="tracking-wider text-gray-400 underline">Všetky príspevky</a>
            </h3>
        </div>

        <h2 class="pt-4 -mb-5 md:-mb-8 tracking-wide font-serif font-bold uppercase text-center text-6xl md:text-8xl text-gray-500">Texty</h2>
        <div
            class="relative p-8 bg-gradient-to-r-252 from-red-800 to-gray-700 text-center py-8"
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
                        <h3 class="slab tracking-wider text-2xl  md:text-3xl text-white mt-2">Stratený svätý</h3>
                        <h4 class="slab tracking-wider text-yellow-200 mt-2 hidden md:block w-3/4">S. Kusá a O. Chrobák v komixe o pátraní po stratenom obraze</h4>
                        <img src="https://placekitten.com/100/100" class="object-cover w-40 mx-auto my-4 md:hidden">
                        <p class="text-sm text-white mt-4 md:w-3/4">Krátka beseda o tom, čo sú hoaxy, na čo sú dobré a čím sa líšía hoaxy dneška od včerajších hoaxov.</p>
                    </div>
                    <hr class="my-6 border-t-2 border-gray-300 md:hidden cutout">
                </div>
                <div class="h-60 cutout hidden md:block" style="width:2px"></div>
                <div class="md:w-1/2">
                    <div class="md:w-1/2 mx-auto">
                        <h5 class="text-sm text-gray-400">Prvýkrát zverejnené</h5>
                        <h3 class="slab tracking-wider text-2xl md:text-3xl text-white mt-2">Výskum</h3>
                        <h4 class="slab tracking-wider text-yellow-200 mt-2 hidden md:block">Markéta Peringerová v komixe o pátraní po stratenom obraze</h4>
                        <img src="https://placekitten.com/100/100" class="object-cover w-40 mx-auto my-4 md:hidden">
                        <p class="text-center text-sm text-white mt-4">Krátka beseda o tom, čo sú hoaxy, na čo sú dobré a čím sa líšía hoaxy dneška od včerajších hoaxov.</p>
                    </div>
                </div>
            </div>

            <h3 class="text-center mt-8 slab text-xl">
                <a href="/pridane" class="tracking-wider text-gray-400 underline">Všetky texty</a>
            </h3>
        </div>
    </div>
</x-app-layout>
