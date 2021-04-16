@props(['title', 'tags'])
<div {{ $attributes }}>
    <h4 class="text-4xl md:text-2xl slab text-center tracking-wide">{{ $title }}</h4>
    <ul class="text-center underline mt-2 space-y-2">
        @foreach ($tags as $tag)
        <li>
            <a href="{{ route('articles.index', ['tag' => $tag]) }}">#{{ $tag }}</a>
        </li>
        @endforeach
    </ul>
</div>
