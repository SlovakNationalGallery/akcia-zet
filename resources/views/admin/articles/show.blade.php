<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Články</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            {{-- <a href="{{ route('admin.articles.create') }}" class="btn mb-4">Pridať článok</a> --}}
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-5">
                <h1 class="text-xl font-bold">{{ $article->title }}</h1>
                <div class="trix-content">
                    {!! $article->content !!}
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
