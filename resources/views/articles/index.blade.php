<x-app-layout>
    {{-- Mobile header --}}
    <h2 class="md:hidden mt-2 slab text-6xl text-gray-500 tracking-wide leading-tight text-center">Pridané</h2>
    @if(isset($tag))
    <div class="p-8 pb-4 max-w-lg mx-auto text-center">
        <span class="slab text-gray-300">Články označené ako</span>
        <h1 class="mt-2 slab text-4xl text-red-800">#{{ $tag }}</h1>
        <hr class="my-4" />
        <a href="{{ route('articles.index') }}" class="text-pink-400">× Zrušiť filter</a>
    </div>
    @elseif(isset($comingSoon))
    <div class="p-8 pb-4 max-w-lg mx-auto text-center">
        <h2 class="mt-2 slab text-4xl text-red-800">Pripravujeme</h2>
        <div class="mt-8 mb-4 article-content">
        {!! $comingSoon !!}
        </div>
        <hr class="mt-8 mb-4" />
    </div>
    @endisset
    <div class="p-8 pb-32 max-w-lg md:max-w-5xl mx-auto">
        @foreach($articles as $article)
            <span class="block text-center uppercase font-mono text-gray-400 text-3xl">
                {{ $article->published_at->format('d M y') }}
            </span>
            <h4 class="mt-8 md:hidden text-3xl slab text-red-800 text-center leading-tight tracking-normal">
                <a href="{{ route('articles.show', $article)}}">{{ $article->title }}</a>
            </h4>
            <div class="grid md:grid-cols-2 md:mt-10 gap-x-20">
                @if($article->hasTitleImage())
                <div class="mt-6 -mx-8 md:m-0">
                    <a href="{{ route('articles.show', $article) }}">
                        {{ $article->titleImage->img()->attributes(['class' => 'object-cover object-center h-60']) }}
                    </a>
                </div>
                @elseif($article->embed_url)
                <div class="mt-6 -mx-8 md:m-0">
                    <x-extended-embed url="{{ $article->embed_url }}" />
                </div>
                @endif
                <div>
                    <h4 class="hidden md:block text-4xl slab text-red-800 text-center leading-tight tracking-normal">
                        <a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a>
                    </h4>
                    <p class="mt-8 slab text-red-800 text-center">
                        <a href="{{ route('articles.show', $article) }}">
                            {{ $article->perex }}
                        </a>
                    </p>
                    <div class="mt-6 text-pink-400 text-center">
                        @foreach($article->tags as $tag)
                            <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="mr-1">#{{ $tag->name }}</a>
                        @endforeach
                    </div>
                </div>
                @unless($article->embed_url || $article->hasTitleImage())
                <div class="hidden md:block article-content">{!! $article->firstContentParagraph !!}</div>
                @endunless
            </div>

            @unless($loop->last)
                <hr class="my-6 md:mt-14 max-w-sm mx-auto">
            @endunless
        @endforeach
    </div>
    <x-topic-list />
    <x-footer />
</x-app-layout>
