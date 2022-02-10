<x-app-layout>
    {{-- Mobile header --}}
    <h2 class="md:hidden mt-2 slab text-6xl text-gray-500 tracking-wide leading-tight text-center">Texty</h2>

    @foreach ($articles as $article)
        <x-research-article-preview
            :article="$article"
            :content="$article->firstContentParagraph"
        >
        </x-research-article-preview>

        @if(!$loop->last)
            <div class="px-8">
                <hr class="max-w-sm mx-auto mt-4 mb-10" />
            </div>
        @endif
    @endforeach

    <x-topic-list class="mt-8" />
    <x-footer />
</x-app-layout>
