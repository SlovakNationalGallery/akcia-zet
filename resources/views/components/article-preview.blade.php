@props(['article'])

@php
    $article = $article ?? \App\Models\Article::first();
@endphp

<div {{ $attributes }}>
    <p class="text-gray-400 text-sm">
        {{ ucfirst($article->published_at->diffForHumans()) }}
    </p>
    <div class="grid grid-cols-{{ $article->embed_url ? '2' : '1' }} gap-4 mt-2">
        @if($article->embed_url)
        <div>
            <x-extended-embed url="{{ $article->embed_url }}" />
        </div>
        @endif
        <h3 class="text-lg text-yellow-200 slab {{ $article->embed_url ? 'md:text-left' : ''}}"><a href="#TODO">{{ $article->title }}</a></h3>
    </div>
    <p class="text-white text-sm mt-2">
        {{ $article->perex }}
    </p>
    <div class="mt-2 text-sm">
        @foreach($article->tags as $tag)
            <a href="#" class="text-pink-400 mr-1">#{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
