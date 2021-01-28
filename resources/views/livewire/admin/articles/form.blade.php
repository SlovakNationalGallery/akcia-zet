<form wire:submit.prevent="save">
    <div x-data="{{ json_encode(['show' => session()->has('message')])}}"
        x-show="show"
        style="display: none;"
        class="text-sm text-gray-600 overflow-hidden sm:rounded-md my-4">
        <div class="px-4 py-5 bg-indigo-500 text-white sm:p-6 flex flex-row items-start">
            <div class="flex-grow">
                {{ session('message') }}
            </div>
            <a href="#" class="font-bold hover:underline" @click.prevent="show = false">Zavrieť</a>
        </div>

    </div>

    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="title" value="Titulok" class="font-bold text-xl" />
                    <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="article.title" />
                    <x-jet-input-error for="article.title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="slug" value="Slug (URL)" />
                    <x-jet-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="article.slug" />
                    <x-jet-input-error for="article.slug" class="mt-2" />
                </div>

                <div class="col-span-4 sm:col-span-4">
                    <label class="flex items-center">
                        <x-jet-checkbox wire:model.defer="article.published" />
                        <span class="ml-2 text-gray-600">Publikovať</span>
                    </label>
                    <x-jet-input-error for="article.published" class="mt-2" />
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            <x-jet-action-message class="mr-3" on="saved">
                Zmeny boli uložené
            </x-jet-action-message>

            <x-jet-button>Uložiť</x-jet-button>
        </div>
    </div>
</form>
