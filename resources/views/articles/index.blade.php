<x-app-layout>
    {{-- Mobile header --}}
    <h2 class="md:hidden mt-2 slab text-6xl text-gray-500 tracking-wide leading-tight text-center">Pridané</h2>
    @isset($tag)
    <div class="p-8 pb-4 max-w-lg mx-auto text-center">
        <span class="slab text-gray-300">Články označené ako</span>
        <h1 class="mt-2 slab text-4xl text-red-800">#{{ $tag }}</h1>
        <hr class="my-4" />
        <a href="{{ route('articles.index') }}" class="text-pink-400">× Zrušiť filter</a>
    </div>
    @endisset
    <div class="p-8 pb-32 max-w-lg md:max-w-5xl mx-auto">
        @foreach($articles as $article)
            <span class="block text-center uppercase font-mono text-gray-300 text-2xl">
                {{ $article->published_at->format('d M y') }}
            </span>
            <h4 class="mt-6 md:hidden text-4xl slab text-red-800 text-center leading-tight">
                <a href="{{ route('articles.show', $article)}}">{{ $article->title }}</a>
            </h4>
            <div class="grid md:grid-cols-2 md:mt-8 gap-x-20">
                @if($article->embed_url)
                <div class="mt-6 -mx-8 md:m-0">
                    <x-extended-embed url="{{ $article->embed_url }}" />
                </div>
                @endif
                <div>
                    <h4 class="hidden md:block text-4xl slab text-red-800 text-center leading-tight">
                        <a href="{{ route('articles.show', $article)}}">{{ $article->title }}</a>
                    </h4>
                    <p class="mt-8 slab text-red-800 text-center">
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->perex }}
                        </a>
                    </p>
                    <div class="mt-6 font-bold text-pink-400 text-center md:text-lg md:font-normal">
                        @foreach($article->tags as $tag)
                            <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="mr-1">#{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                @if(! $article->embed_url)
                <p class="hidden md:block text-lg">{{ Str::limit(strip_tags($article->content), 400) }}</p>
                @endif
            </div>

            @unless($loop->last)
                <hr class="my-6 md:mt-12 max-w-sm mx-auto">
            @endunless
        @endforeach
    </div>
    <x-topic-list />
    <x-footer />
</x-app-layout>
