<x-article-page
    :title="$article->title"
    :perex="$article->perex"
    :content="$article->content"
    :embedUrl="$article->embed_url"
    :tags="$article->tags->pluck('name')"
    :previousArticle="$prevArticle"
    :nextArticle="$nextArticle"
>
    <x-slot name="meta">
        <span title="{{ $article->published_at->toDateString() }}">
            Uverejnené {{ $article->published_at->diffForHumans() }}
        </span>
    </x-slot>
</x-article-page>
