<x-app-layout>
  <div class="bg-gradient-to-r-260 from-red-800 to-gray-400">
      {{-- TODO time lapse --}}
    <img src="https://placekitten.com/800/600" class="object-cover h-1/2-screen">
    <nav class="absolute inset-x-0 top-0 px-4 pt-4">
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

    </nav>
    <div class="container text-center mx-auto py-8 sm:w-3/4 xl:w-1/2 overflow-hidden">
        <p class="uppercase font-serif font-bold text-gray-300 leading-relaxed tracking-wider px-6">
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
  <h2 class="pt-4 -mb-5 tracking-wide font-serif font-bold uppercase text-center text-6xl text-gray-500">Pridané</h2>
  <div class="relative px-8 bg-gradient-to-r-334 from-red-800 to-gray-700 text-center pt-8">
    <h3 class="text-2xl font-serif text-yellow-400 font-bold uppercase tracking-wider">Hoaxy medzi nami</h3>
    @if($article->embed_url)
        <div class="my-4 -mx-8">
            <x-extended-embed url="{{ $article->embed_url }}" />
        </div>
    @endif
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

    <div class="text-left text-sm">
        @foreach($articles as $article)
            <hr class="my-6 border-t-2 border-gray-300">
            <p class="text-gray-400 mt-4">
                {{ ucfirst($article->published_at->diffForHumans()) }}
            </p>
            <div class="grid grid-cols-{{ $article->embed_url ? '2' : '1' }} gap-4 mt-2">
                @if($article->embed_url)
                <div>
                    <x-extended-embed url="{{ $article->embed_url }}" />
                </div>
                @endif
                <h3 class="text-lg text-yellow-200 slab"><a href="#TODO">{{ $article->title }}</a></h3>
            </div>
            <p class="text-white mt-2">
                {{ $article->perex }}
            </p>
            <div class="mt-2">
                @foreach($article->tags as $tag)
                    <a href="#" class="text-pink-400 mr-1">#{{ $tag->name }}</a>
                @endforeach
            </div>
        @endforeach
    </div>

    <a href="/pridane" class="my-8 slab inline-block text-gray-400 underline">Všetky príspevky</a>
  </div>

  <h2 class="pt-4 -mb-5 tracking-wide font-serif font-bold uppercase text-center text-6xl text-gray-500">Text</h2>
  <div class="relative px-8 bg-gradient-to-r-252 from-red-800 to-gray-700 text-center pt-8">
        <h5 class="text-sm text-gray-400">Pripravujeme</h5>
        <h3 class="slab text-2xl text-white mt-2">Stratený svätý</h3>
        <img src="https://placekitten.com/100/100" class="object-cover w-40 mx-auto my-4">
        <p class="text-center text-sm text-white">Krátka beseda o tom, čo sú hoaxy, na čo sú dobré a čím sa líšía hoaxy dneška od včerajších hoaxov.</p>

        <hr class="my-6 border-t-2 border-gray-300">

        <h5 class="text-sm text-gray-400">Prvýkrát zverejnené</h5>
        <h3 class="slab text-2xl text-white mt-2">Výskum</h3>
        <img src="https://placekitten.com/100/100" class="object-cover w-40 mx-auto my-4">
        <p class="text-center text-sm text-white">Krátka beseda o tom, čo sú hoaxy, na čo sú dobré a čím sa líšía hoaxy dneška od včerajších hoaxov.</p>
  </div>
</x-app-layout>
