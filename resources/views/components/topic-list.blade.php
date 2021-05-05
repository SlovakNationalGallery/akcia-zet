<div {{ $attributes->merge(['class' => 'bg-gradient-to-r-216 from-red-800 to-gray-700 shadow-md' ]) }}>
    <div class="p-8 pt-4 md:pt-6 md:pb-20 max-w-5xl mx-auto">
        <h3 class="text-xl md:text-3xl slab text-gray-400 text-center tracking-wide">
            Témy projektu
        </h3>
        <div class="grid md:grid-flow-col md:auto-cols-auto mx-auto gap-y-8 mt-8 md:mt-12">
            <x-topic-list-section
                title="Aktéri"
                class="text-white md:border-r-2"
                :tags="['ateliér', 'autorstvo', 'originál']"
            />
            <x-topic-list-section
                title="Artefakt"
                class="text-yellow-200 md:border-r-2"
                :tags="['maľba', 'sorela', 'autorská kópia']"
            />
            <x-topic-list-section
                title="Monument"
                class="text-yellow-400 md:border-r-2"
                :tags="['pamäť', 'video', 'monumentálna maľba']"
            />
            <x-topic-list-section
                title="Propaganda"
                class="text-yellow-600"
                :tags="['kritické myslenie', 'totalitarizmus', 'médiá',]"
            />
        </div>
    </div>
</div>
