<x-app-layout>
  @include('googletagmanager::body')
  {{-- TODO time lapse --}}
  <img src="https://placekitten.com/800/600" class="object-cover h-64 w-full">

  <div class="container text-center mx-auto py-8 sm:w-3/4 xl:w-1/2 overflow-hidden">
    <p class="uppercase font-serif font-bold text-sm text-gray-400 leading-relaxed tracking-wider px-6">
        Vydávame sa na niekoľkomesačnú vzrušujúcu umenovednú výpravu,
        na&nbsp;ktorej otvoríme dôležité a&nbsp;aktuálne témy
    </p>

    @foreach($articles as $article)
        <h2 class="text-xl font-serif text-yellow-400 font-bold uppercase tracking-wider mt-8 px-6">{{ $article->title }}</h2>
        @if($article->embed_url)
            <div class="my-4">
                <x-extended-embed url="{{ $article->embed_url }}" />
            </div>
        @endif
        <div class="px-8">
            <p class="text-sm text-gray-400 my-5">
                {{ ucfirst($article->published_at->diffForHumans()) }}
            </p>
            <p class="text-sm text-white">
                {{ $article->perex }}
            </p>

            <div class="mt-4">
                @foreach($article->tags as $tag)
                <a href="#" class="text-pink-400 mr-1">#{{ $tag->name }}</span>
                @endforeach
            </div>
        </div>
    @endforeach
  </div>
</x-app-layout>
