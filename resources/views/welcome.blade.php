<x-app-layout>
    {{-- Background image --}}
    <div class="fixed inset-0 bg-gray-800" x-data id="openseaviewer" x-init="initOpenSeaDragon($el.id)"></div>

    <div class="relative">
        <div class="-mt-20 md:pt-20 bg-gradient-to-r-270 from-red-800 to-gray-700">
            {{-- Shadow overlay for mobile --}}
            <div class="absolute md:hidden top-0 inset-x-0 h-20 opacity-40 bg-gradient-to-b from-black to-transparent z-10"></div>

            {{-- Timelapse --}}
            <div
                x-data="{
                    dates: {{ json_encode($timelapseImagesDates->map->timestamp) }},
                    flickity: null,
                    sliderCssClasses: {
                        base: 'base z-auto',
                        target: 'target bg-gray-400 border-0 rounded-none shadow-none h-4',
                        connect: 'connect bg-yellow-500',
                        connects: 'connects rounded-none',
                        handle: ' absolute w-16 -right-8 -top-5 focus:outline-none',
                        active: '',
                        tooltip: ' absolute transform left-1/2 -translate-x-1/2 font-mono text-yellow-200 mt-1 text-2xl w-48 text-center pt-0.5',
                        pips: ' h-4 inset-0 -mt-4',
                        pipsHorizontal: '',
                        marker: ' absolute h-4 w-1 -ml-0.5 pointer-events-none bg-red-500',
                        markerLarge: ' h-4 bg-pink-600',
                        valueLarge: ' hidden'
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
                <div class="main-carousel h-1/2-screen md:h-5/6-screen overflow-hidden" x-ref="carousel">
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
                <svg x-ref="handle" x-cloak class="fill-current text-yellow-200 hover:text-yellow-500 cursor-pointer w-10/12" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 80 78">
                    <defs>
                        <filter id="a" width="80" height="78" x="0" y="0" filterUnits="userSpaceOnUse">
                        <feOffset dy="3"/>
                        <feGaussianBlur result="blur" stdDeviation="3"/>
                        <feFlood flood-opacity=".161"/>
                        <feComposite in2="blur" operator="in"/>
                        <feComposite in="SourceGraphic"/>
                        </filter>
                    </defs>
                    <g filter="url(#a)">
                        <path d="M40 6l31 22.918L59.159 66H20.841L9 28.918z" data-name="Polygon 1"/>
                    </g>
                    <path fill="rgba(0,0,0,0)" stroke="#a5a5a5" d="M64.386 41.5L33.5 64.071zm-6-9L27.5 55.071zm-7-8L20.5 47.071zm-6-9L14.5 38.071z" data-name="Union 1"/>
                </svg>
                <div class="hidden md:flex justify-between px-16 mt-6 font-mono text-2xl text-gray-400">
                    <span>NOV 20</span>
                    <span>JÚN 21</span>
                </div>
            </div>
            <div class="container text-center mx-auto md:max-w-screen-md py-8 pt-16 md:pt-8 ">
                <p class="text-xl slab text-white leading-relaxed px-6">
                    Vydávame sa na niekoľkomesačnú vzrušujúcu umenovednú výpravu,
                    na&nbsp;ktorej otvoríme dôležité a&nbsp;aktuálne témy
                </p>
                <h3 class="text-center mt-4 mb-8 slab text-xl">
                    <a href="{{ route('about') }}" class="text-gray-400 underline">O projekte</a>
                </h3>
            </div>
        </div>

        <h2 class="pt-4 -mb-5 md:-mb-8 slab tracking-normal text-center text-6xl md:text-8xl text-gray-700">Pridané</h2>
        <div class="relative p-8 bg-gradient-to-r-334 from-red-800 to-gray-700 text-center"
            x-data="calculateCutoutPolygon($el, 'hr')"
            x-on:resize.window.debounce="polygonPoints = calculateCutoutPolygon($el, 'hr').polygonPoints"
            :style="`clip-path: polygon(${polygonPoints.join(',')})`"
            >
            @isset($featuredArticle)
            <h3 class="text-2xl md:text-3xl font-serif text-yellow-400 font-bold uppercase tracking-wide py-6 md:py-8">
                <a href="{{ route('articles.show', $featuredArticle) }}">{{ $featuredArticle->title }}</a>
            </h3>
            <div class="md:w-1/2 mx-auto md:flex gap-12">
                @if($featuredArticle->embed_url)
                    <div class="-mx-8 md:text-right md:w-1/2">
                        <x-extended-embed url="{{ $featuredArticle->embed_url }}" />
                    </div>
                @elseif($featuredArticle->hasTitleImage())
                    <div class="-mx-8 md:text-right md:w-1/2">
                        <a href="{{ route('articles.show', $featuredArticle) }}">
                            {{ $featuredArticle->titleImage->img()->attributes(['class' => 'object-cover object-center h-60']) }}
                        </a>
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
            @endisset

            <div class="text-left text-sm md:text-center md:flex md:gap-12 md:max-w-5xl md:mx-auto">
                @foreach($articles as $article)
                    <div class="md:w-1/3">
                        <hr class="my-6 md:mt-12 md:mx-6 border-t-3 border-transparent">
                        <x-article-preview :article="$article" class="mt-4" />
                    </div>
                @endforeach
            </div>

            <h3 class="text-center mt-8 slab text-xl">
                <a href="{{ route('articles.index') }}" class="text-gray-400 underline">Všetky príspevky</a>
            </h3>
        </div>

        <h2 class="pt-4 -mb-5 md:-mb-8 slab tracking-normal text-center text-6xl md:text-8xl text-gray-700">Texty</h2>
        <div
            class="relative p-8 bg-gradient-to-r-252 from-red-800 to-gray-700 text-center py-8"
            x-data="calculateCutoutPolygon($el, '.cutout')"
            x-on:resize.window.debounce="polygonPoints = calculateCutoutPolygon($el, '.cutout').polygonPoints"
            :style="`clip-path: polygon(${polygonPoints.join(',')})`"
            >
            <div class="md:flex md:max-w-5xl mx-auto">
                @if($researchArticles->count() === 2)
                <x-research-article-small-preview
                    class="mt-4 md:w-1/2"
                    :article="$researchArticles->firstWhere('slug', 'ztraceny-svaty')"
                    perex="Česko-slovenský detektívny príbeh s kunsthistorickou zápletkou, komiksom a historickým ponaučením"
                />

                <hr class="my-6 border-t-2 border-gray-300 md:hidden cutout">
                <div class="h-60 cutout hidden md:block mx-8" style="width:2px"></div>

                <x-research-article-small-preview
                    class="mt-4 md:w-1/2"
                    :article="$researchArticles->firstWhere('slug', 'z-vyskumu-obrazu')"
                    perex="Markéta Peringerová o výskume pôvodného diela Vďakyvzdanie z roku 1952"
                />
                @endif
            </div>

            <h3 class="text-center mt-8 slab text-xl">
                <a href="{{ route('research-articles.index') }}" class="text-gray-400 underline">Všetky texty</a>
            </h3>
        </div>
        @livewire('newsletter-signup-form', ['class' => 'my-5 md:my-0'])
        <div class="bg-gradient-to-r-252 from-red-800 to-gray-700 pt-2">
            <x-footer dark />
        </div>
    </div>
</x-app-layout>
