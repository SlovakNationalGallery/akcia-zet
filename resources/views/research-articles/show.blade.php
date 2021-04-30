<x-article-page
    :title="$article->title"
    :perex="$article->perex"
    :content="$article->content"
    :embedUrl="$article->embed_url"
    :tags="$article->tags->pluck('name')"
>
</x-article-page>
