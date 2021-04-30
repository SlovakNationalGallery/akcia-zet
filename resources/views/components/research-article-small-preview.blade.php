@props(['article', 'perex'])

<div {{ $attributes->merge(['class' => 'grid grid-cols-1 md:grid-cols-7'])}}>
    <div class="md:hidden">
        <h3 class="slab text-2xl text-white mb-4">
            <a href="{{ route('research-articles.show', $article) }}">{{ $article->title }}</a>
        </h3>
    </div>
    <div class="md:col-span-3">
        <a href="{{ route('research-articles.show', $article) }}">
            {{ $article->titleImage }}
        </a>
    </div>
    <div class="md:col-span-4 px-6">
        <h3 class="slab hidden md:block text-3xl text-white md:col-span-4 md:col-start-4">
            <a href="{{ route('research-articles.show', $article) }}">{{ $article->title }}</a>
        </h3>
        <h4 class="slab tracking-wider text-yellow-200 mt-4">{{ $perex }}</h4>
    </div>
</div>
