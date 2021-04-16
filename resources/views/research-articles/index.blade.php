<x-app-layout>
    {{-- Mobile header --}}
    <h2 class="md:hidden mt-2 slab text-6xl text-gray-500 tracking-wide leading-tight text-center">Texty</h2>

    <x-research-article-preview
        title="Akcia ZET umenovedná výprava"
        embedUrl="https://www.youtube.com/watch?v=A9nQOgZKVGg"
        :tags="['propaganda', 'článok', 'video']"
    >
        <x-slot name="perex">
            Od novembra tohto roku maľuje v átriu SNG výtvarník Marcel Mališ autorskú repliku strateného diela - svoj nový obraz s pozmeneným názvom VďakyZdanie československého ľudu. Ako verne k úlohe pristúpi, bude na jeho rozhodnutí.
        </x-slot>
        <x-slot name="meta">
            Alexandra Kusá<br/>
            19. Novembra 2020
        </x-slot>

        <x-slot name="content">
            Pre maliara bude galéria „pracovňou“ a obraz tak bude pribúdať pred zrakmi verejnosti. Maliarska akcia je východiskom pre nový experimentálny žáner - umenovednú výpravu, ktorá zrkadlí naše premýšľanie o postavení národnej galérie ako vzdelávacej inštitúcie dnes. Je to miesto kladenia otázok a hľadania odpovedí.
        </x-slot>
    </x-research-article-preview>

    <div class="px-8">
        <hr class="max-w-sm mx-auto mt-4 mb-10" />
    </div>

    <x-research-article-preview
        title="Akcia ZET umenovedná výprava"
        embedUrl="https://www.youtube.com/watch?v=A9nQOgZKVGg"
        :tags="['propaganda', 'článok', 'video']"
    >
        <x-slot name="perex">
            Od novembra tohto roku maľuje v átriu SNG výtvarník Marcel Mališ autorskú repliku strateného diela - svoj nový obraz s pozmeneným názvom VďakyZdanie československého ľudu. Ako verne k úlohe pristúpi, bude na jeho rozhodnutí.
        </x-slot>
        <x-slot name="meta">
            Alexandra Kusá<br/>
            19. Novembra 2020
        </x-slot>

        <x-slot name="content">
            Pre maliara bude galéria „pracovňou“ a obraz tak bude pribúdať pred zrakmi verejnosti. Maliarska akcia je východiskom pre nový experimentálny žáner - umenovednú výpravu, ktorá zrkadlí naše premýšľanie o postavení národnej galérie ako vzdelávacej inštitúcie dnes. Je to miesto kladenia otázok a hľadania odpovedí.
        </x-slot>
    </x-research-article-preview>

    <x-topic-list class="mt-8" />
    <x-footer />
</x-app-layout>
