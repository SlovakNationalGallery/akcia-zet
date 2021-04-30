@props(['title', 'perex', 'tags', 'meta', 'embedUrl', 'previousArticle', 'nextArticle', 'content'])

@php
    $tags = $tags ?? [];
@endphp

<div class="p-8 max-w-5xl mx-auto md:grid md:grid-cols-3 gap-x-8">
    <div class="md:col-span-3">
        <h2 class="slab text-4xl text-red-800 tracking-wide leading-tight text-center">{{ $title }}</h2>
        <p class="mt-6 md:hidden text-gray-400 text-center">
            {{ $meta }}
        </p>
        <p class="mt-8 max-w-2xl mx-auto text-sm slab font-bold tracking-wide text-red-800 text-center leading-relaxed md:mt-4 md:text-lg md:leading-7">
            {{ $perex ?? '' }}
        </p>
    </div>
    @isset($embedUrl)
    <div class="mt-10 -mx-8 md:mx-0 md:mb-12 md:col-start-2 md:col-span-2">
        <div class="max-w-sm">
            <x-extended-embed url="{{ $embedUrl }}" />
        </div>
    </div>
    @endisset

    <div class="hidden md:block">
        <p class="text-gray-400 ">
            {{ $meta }}
        </p>
        <ul class="mt-8 text-pink-400 space-y-2">
            @foreach($tags as $tag)
                <li><a href="{{ route('articles.index', ['tag' => $tag]) }}">#{{ $tag }}</a></li>
            @endforeach
        </ul>
    </div>
    <div class="mt-8 md:mt-0 md:leading-relaxed text-gray-800 col-span-2 article-content">
        {!! $content !!}
    </div>

    <div class="mt-6 md:hidden text-pink-400 flex justify-center flex-wrap underline">
        @foreach($tags as $tag)
            <a href="{{ route('articles.index', ['tag' => $tag]) }}" class="px-2">#{{ $tag }}</a>
        @endforeach
    </div>
</div>

