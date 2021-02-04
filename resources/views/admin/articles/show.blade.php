<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Články</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <h1 class="text-xl font-bold mb-2">Perex</h1>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-xl font-bold">{{ $article->title }}</h1>
                @if($article->embed_url)
                    <div class="my-4">
                        <x-embed url="{{ $article->embed_url }}" />
                    </div>
                @endif
                {!! $article->perex !!}
            </div>
            <h1 class="text-xl font-bold mb-2 mt-8">Obsah</h1>
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-xl font-bold">{{ $article->title }}</h1>
                @if($article->embed_url)
                    <div class="my-4">
                        <x-embed url="{{ $article->embed_url }}" />
                    </div>
                @endif
                {!! $article->content !!}
            </div>
        </div>
    </div>
</x-admin-layout>
