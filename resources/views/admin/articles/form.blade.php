<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ $article->exists ? 'Upraviť článok' : 'Vytvoriť článok' }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <livewire:admin.articles.form :article="$article">
            </div>
        </div>
    </div>
</x-admin-layout>
