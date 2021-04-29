@props(['title', 'perex', 'tags', 'meta', 'embedUrl', 'previousArticle', 'nextArticle', 'content'])

@php
    $tags = $tags ?? [];
@endphp

<x-app-layout>
    {{-- Mobile header --}}
    <div class="px-6 md:hidden">
        <div class="mt-4 text-pink-400 flex justify-center flex-wrap">
            @foreach($tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag]) }}" class="px-2">#{{ $tag }}</a>
            @endforeach
        </div>
        <h2 class="mt-4 slab text-4xl text-red-800 tracking-normal leading-tight text-center">{{ $title }}</h2>
        <p class="mt-4 text-gray-400 text-center">
           {{ $meta }}
        </p>
    </div>
    @isset($embedUrl)
        <div class="mt-10 md:mt-0 hidden md:block">
            <x-extended-embed url="{{ $embedUrl }}" aspect-ratio="16:6.5" />
        </div>
        <div class="mt-10 md:mt-0 md:hidden">
            <x-extended-embed url="{{ $embedUrl }}" />
        </div>
    @else
        <div class="md:mt-24"></div>
    @endisset
    <div class="px-6 max-w-5xl mx-auto">
        <h2 class="mt-10 hidden md:block slab text-5xl text-red-800 tracking-normal leading-tight text-center">{{ $title }}</h2>
        <p class="mt-8 max-w-2xl mx-auto slab font-bold tracking-wide text-red-800 text-center leading-relaxed md:text-lg md:leading-7">
            {{ $perex ?? '' }}
        </p>
        <div class="mt-4 md:mt-12 md:grid md:grid-cols-3 gap-x-8">
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
            <div class="text-gray-800 col-span-2 article-content">
                {!! $content !!}
            </div>
        </div>

        <div class="mt-6 md:hidden text-pink-400 flex justify-center flex-wrap">
            @foreach($tags as $tag)
                <a href="{{ route('articles.index', ['tag' => $tag]) }}" class="px-2">#{{ $tag }}</a>
            @endforeach
        </div>
    </div>
    @if(isset($previousArticle) && isset($nextArticle))
    <div class="mt-12 p-6 md:p-24 md:pb-10 bg-gradient-to-r-334 from-red-800 to-gray-700 shadow-lg">
        <div class="max-w-screen-2xl mx-auto grid lg:grid-cols-2 gap-x-16">
            <div class="flex items-center">
                <svg class="h-44 lg:h-60 mr-8 flex-shrink-0" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32.813 300.578">
                    <defs/><g data-name="Path 15"><path fill="none" stroke="#fffdc1" stroke-miterlimit="10" stroke-width="2.835" d="M31.425.289L2.662 138.338a58.34 58.34 0 000 23.9l28.763 138.049" data-name="Path 18"/></g>
                </svg>
                <x-article-preview class="pt-4 lg:px-24 lg:self-start" :article="$previousArticle" />
            </div>
            <div>
                {{-- Mobile divider --}}
                <hr class="my-6 border-t-2 border-yellow-200 lg:hidden">
                <div class="flex items-center">
                    {{-- Desktop divider --}}
                    <div class="hidden lg:block border-l-2 border-yellow-200 h-60 w-2 -ml-8 mr-8"></div>
                    <x-article-preview class="pt-4 lg:px-24 lg:self-start" :article="$nextArticle" />
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
    @endif
    @livewire('newsletter-signup-form')
    <x-footer />
</x-app-layout>

