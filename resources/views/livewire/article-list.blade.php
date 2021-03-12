<div>
    <div class="flex flex-wrap justify-center text-center space-x-4">
        <a wire:click.prevent="$set('tag', null)" href="{{ route('articles.index') }} }}" class="font-bold {{ !$tag ? 'underline' : '' }}">Všetky</a>
        @foreach($tags as $tag)
            <a
                wire:key="$tag"
                wire:click.prevent="$set('tag', '{{ $tag }}')"
                href="{{ route('articles.index', ['tag' => $tag]) }} }}"
                class="text-pink-400 font-bold {{ $this->tag == $tag ? 'underline' : '' }}"
            >{{ $tag }}</a>
        @endforeach
    </div>

    <ul class="mt-8 space-y-2">
    @foreach($articles as $article)
        <li wire:key="{{$article->id}}">
            <h4 class="slab"><a href="{{ route('articles.show', $article) }}">{{ $article->title }}</a></h4>
            <p>{{ $article->perex }}</p>
        </li>
    @endforeach
    </ul>
</div>



