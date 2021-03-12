<x-app-layout>
    <x-slot name="styles">
        @livewireStyles
    </x-slot>

    <x-slot name="scripts">
        @livewireScripts
    </x-slot>

    <div class="nav-spacer"></div>
    <div class="p-6 max-w-lg mx-auto">
        @isset($comingSoon)
            <h3 class="mt-10 slab text-center ">Pripravujeme</h3>
            <div>
                {!! $comingSoon !!}
            </div>
        @endisset

        <div class="mt-20">
            <livewire:article-list
                class="max-w-md mx-auto"
                :tags="$tags"
            />
        </div>
    </div>


</x-app-layout>
