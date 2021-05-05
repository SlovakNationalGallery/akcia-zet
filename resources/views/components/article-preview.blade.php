@props(['article'])

<div {{ $attributes }}>
    <p class="text-gray-400 text-sm">
        {{ ucfirst($article->published_at->diffForHumans()) }}
    </p>
    <div class="grid grid-cols-{{ $article->hasTitleImage() ? '2' : '1' }} gap-4 mt-2">
        @if($article->hasTitleImage())
            <a href="{{ route('articles.show', $article) }}">
                {{ $article->titleImage->img()->attributes(['class' => 'object-cover object-center h-24']) }}
            </a>
        @endif
        <h3 class="text-lg text-yellow-200 tracking-wide slab {{ $article->hasTitleImage() ? 'md:text-left' : ''}}"><a href="{{ route('articles.show', $article)}}">{{ $article->title }}</a></h3>
    </div>
    <p class="text-white text-sm mt-2 tracking-wide leading-relaxed">
        {{ $article->perex }}
    </p>
    <div class="mt-2 text-sm">
        @foreach($article->tags as $tag)
            <a href="{{ route('articles.index', ['tag' => $tag->name]) }}" class="text-pink-400 mr-1">#{{ $tag->name }}</a>
        @endforeach
    </div>
</div>
