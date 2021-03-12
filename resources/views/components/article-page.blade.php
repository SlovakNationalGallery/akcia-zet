@props(['title', 'perex', 'tags', 'meta', 'embedUrl', 'previousArticle', 'nextArticle'])

<x-app-layout>
    <div class="nav-spacer"></div>
    {{-- Mobile header --}}
    <div class="px-6 md:hidden">
        <div class="mt-4 text-sm text-pink-400 font-semibold flex justify-center flex-wrap">
            @foreach($tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag]) }}" class="px-2">#{{ $tag }}</a>
            @endforeach
        </div>
        <h2 class="mt-4 slab text-4xl text-red-800 tracking-wide leading-tight text-center">{{ $title }}</h2>
        <p class="mt-4 text-gray-400 text-sm text-center">
           {{ $meta }}
        </p>
    </div>
    @if($embedUrl)
        <div class="mt-10 md:mt-0 hidden md:block">
            <x-extended-embed url="{{ $embedUrl }}" aspect-ratio="16:6.5" />
        </div>
        <div class="mt-10 md:mt-0 md:hidden">
            <x-extended-embed url="{{ $embedUrl }}" />
        </div>
    @else
        <div class="mt-24"></div>
    @endif
    <div class="px-6 max-w-5xl mx-auto">
        <h2 class="mt-10 hidden md:block slab text-5xl text-red-800 tracking-wide leading-tight text-center">{{ $title }}</h2>
        <p class="mt-8 max-w-2xl mx-auto slab font-bold text-sm tracking-wide text-red-800 text-center leading-relaxed md:text-lg md:leading-7">
            {{ $perex }}
        </p>
        <div class="mt-4 md:mt-12 md:grid md:grid-cols-3 gap-x-8  text-sm md:text-lg ">
            <div class="hidden md:block">
                <p class="text-gray-400 ">
                    {{ $meta }}
                </p>
                <ul class="mt-8 text-pink-400 font-semibold space-y-2">
                    @foreach($tags as $tag)
                        <li><a href="{{ route('articles.index', ['tag' => $tag]) }}">#{{ $tag }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="text-gray-800 col-span-2">
                {{ $content }}
            </div>
        </div>

        <div class="mt-6 md:hidden text-sm text-pink-400 font-semibold flex justify-center flex-wrap">
            @foreach($tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag]) }}" class="px-2">#{{ $tag }}</a>
            @endforeach
        </div>
    </div>
    <div class="mt-12 p-6 md:p-24 md:pb-10 bg-gradient-to-r-334 from-red-800 to-gray-700 shadow-lg">
        <div class="max-w-screen-2xl mx-auto grid md:grid-cols-2 gap-x-16">
            <div class="flex items-center">
                <svg class="h-44 md:h-60 mr-8 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.813 300.578">
                    <defs/><g data-name="Path 15"><path fill="none" stroke="#fffdc1" stroke-miterlimit="10" stroke-width="2.835" d="M31.425.289L2.662 138.338a58.34 58.34 0 000 23.9l28.763 138.049" data-name="Path 18"/></g>
                </svg>
                <x-article-preview class="pt-4 md:px-24 md:self-start" :article="$previousArticle" />
            </div>
            <div>
                {{-- Mobile divider --}}
                <hr class="my-6 border-t-2 border-yellow-200 md:hidden">
                <div class="flex items-center">
                    {{-- Desktop divider --}}
                    <div class="hidden md:block border-l-2 border-yellow-200 h-60 w-2 -ml-8 mr-8"></div>
                    <x-article-preview class="pt-4 md:px-24 md:self-start" :article="$nextArticle" />
                    <svg class="h-44 ml-8 md:h-60 flex-shrink-0 transform rotate-180" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.813 300.578">
                        <defs/><g data-name="Path 15"><path fill="none" stroke="#fffdc1" stroke-miterlimit="10" stroke-width="2.835" d="M31.425.289L2.662 138.338a58.34 58.34 0 000 23.9l28.763 138.049" data-name="Path 18"/></g>
                    </svg>
                </div>
            </div>
        </div>
        <h3 class="slab mt-12 text-2xl md:text-xl tracking-wide text-center text-gray-400 underline">
            <a href="{{ route('articles.index') }}">Všetky príspevky</a>
        </h3>
    </div>
    <div class="px-6 pb-16 max-w-5xl mx-auto">
        <div class="md:flex text-center md:text-left text-red-800 mt-6 md:mt-12">
            <div class="order-2">
                <h3 class="slab text-2xl md:text-xl tracking-wide">Partneri projektu</h3>
                <ul class="mt-4 text-xs md:text-lg space-y-4">
                    <li><a href="https://www.ustrcr.cz/" class="font-bold underline">Ústav pro studium totalitních režimů v Prahe</a></li>
                    <li><a href="https://historickarevue.sme.sk/t/5318/dejiny-tyzdenny-historicky-podcast" class="font-bold underline">Denník SME – podcast Dejiny a Jaroslav Valent (šéfredaktor časopisu Historická revue)</a></li>
                    <li><a href="https://snd.sk/" class="font-bold underline">Slovenské národné divadlo</a></li>
                    <li>
                        Špeciálne poďakovanie za umožnenie prístupu k archívnym materiálom patrí Vojenskému historickému ústavu v Prahe.
                    </li>
                </ul>
            </div>
            <div class="order-1 md:max-w-md">
                <h3 class="mt-10 md:mt-0 slab text-2xl md:text-xl tracking-wide">Cold Revolution</h3>
                <p class="mt-4 text-xs md:text-lg md:pr-16">
                    Akcia ZET je pripravená aj pri príležitosti výstavno-edičného projektu
                    <a href="https://zacheta.art.pl/en/kalendarz/konferencja-6" class="font-bold underline">Cold Revolution</a>
                    (Jérôme Bazin, Joanna Kordjak) v Národnej galérii umenia Zachęta vo Varšave.
                </p>
            </div>
        </div>

        <div class="mt-8 md:mt-16 max-w-4xl mx-auto text-center">
            <div class="text-pink-600">
                <p class="slab leading-relaxed md:text-lg">
                    „našou motiváciou je presvedčenie, že proti nebezpečenstvu totality vedie iba jedna cesta:
                    cesta skúsenosti a slobodnej diskusie o tom, čoho sa treba vyvarovať“
                </p>
                <p class="mt-2 text-sm md:text-lg">Traumfabrik Kommunismus, 2003</p>
            </div>
        </div>
    </div>
</x-app-layout>

