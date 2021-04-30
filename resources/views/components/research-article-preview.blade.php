@props(['article', 'meta', 'content'])

@php
    $tags = $tags ?? [];
@endphp

<div class="p-8 max-w-5xl mx-auto md:grid md:grid-cols-3 gap-x-8">
    <div class="md:col-span-3">
        <h2 class="slab text-4xl text-red-800 tracking-wide leading-tight text-center">
            <a href="{{ route('research-articles.show', $article) }}">{{ $article->title }}</a>
        </h2>
        @isset($meta)
        <p class="mt-6 mb-8 md:hidden text-gray-400 text-center">
            {{ $meta }}
        </p>
        @endisset
        <p class="mt-6 max-w-2xl mx-auto text-sm slab font-bold tracking-wide text-red-800 text-center leading-relaxed md:mt-4 md:text-lg md:leading-7">
            {{ $article->perex }}
        </p>
    </div>
    <div class="mt-10 -mx-8 md:mb-12 md:col-span-3 max-w-3xl md:mx-auto ">
        @if(isset($article->embedUrl))
        <div class="max-w-sm">
            <x-extended-embed url="{{ $article->embedUrl }}" />
        </div>
        @elseif($article->hasTitleImage())
        <a href="{{ route('research-articles.show', $article) }}" class="">
            {{ $article->titleImage->img()->attributes(['class' => 'object-contain max-h-64 md:max-h-96']) }}
        </a>
        @endif
    </div>

    <div class="hidden md:block">
        @isset($meta)
        <p class="text-gray-400 mb-8">
            {{ $meta }}
        </p>
        @endisset
        <ul class="text-pink-400 space-y-2">
            @foreach($article->tags as $tag)
                <li><a href="{{ route('articles.index', ['tag' => $tag]) }}">#{{ $tag->name }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="col-span-2">
        <div class="mt-8 md:mt-0 md:leading-relaxed text-gray-800  article-content">
            {!! $content !!}
        </div>
        <p class="mt-8 font-mono uppercase text-2xl text-gray-400 hover:text-pink-400">
            <a href="{{ route('research-articles.show', $article) }}">Viac ></a>
        </p>
    </div>

    <div class="mt-6 md:hidden text-pink-400 flex justify-center flex-wrap underline">
        @foreach($tags as $tag)
            <a href="{{ route('articles.index', ['tag' => $tag]) }}" class="px-2">#{{ $tag->name }}</a>
        @endforeach
    </div>
</div>

