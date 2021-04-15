<x-app-layout>
    <div class="nav-spacer"></div>
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
    <div class="bg-gradient-to-r-216 from-red-800 to-gray-700">
        <div class="p-8 pt-4 md:pt-6 md:pb-20 max-w-5xl mx-auto">
            <h3 class="text-xl md:text-3xl slab text-gray-400 text-center tracking-wide">
                Témy projektu
            </h3>
            <div class="grid md:grid-flow-col md:auto-cols-auto mx-auto gap-y-8 mt-8 md:mt-12">
                <x-topic-tag-list
                    title="Aktéri"
                    class="text-white md:border-r-2"
                    :tags="['propaganda-a-asdasd', 'článok', 'video']"
                />
                <x-topic-tag-list
                    title="Artefakt"
                    class="text-yellow-200 md:border-r-2"
                    :tags="['propaganda', 'článok', 'video']"
                />
                <x-topic-tag-list
                    title="Monument"
                    class="text-yellow-400 md:border-r-2"
                    :tags="['propaganda', 'článok', 'video']"
                />
                <x-topic-tag-list
                    title="Propaganda"
                    class="text-yellow-600"
                    :tags="['propaganda', 'článok', 'video']"
                />
            </div>
        </div>
    </div>
    <x-footer />
</x-app-layout>
