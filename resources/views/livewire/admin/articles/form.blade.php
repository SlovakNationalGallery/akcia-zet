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
                    <x-jet-label for="slug" value="Slug (URL)" class="font-bold" />
                    <x-jet-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="article.slug" />
                    <x-jet-input-error for="article.slug" class="mt-2" />
                </div>

                <div class="col-span-6">
                    <x-jet-label for="perex" value="Perex" class="font-bold" />
                    <div x-data="{ trix: @entangle('article.perex').defer }" class="mt-2">
                        <input id="perex" type="hidden" value="{{ $article->perex }}" />
                        <div wire:ignore>
                            <trix-editor x-model.debounce.300ms="trix" input="perex" class="trix-content h-40 overflow-y-auto">
                            </trix-editor>
                        </div>
                    </div>
                </div>

                <div class="col-span-6">
                    <x-jet-label for="content" value="Obsah" class="font-bold text-xl" />
                    <div x-data="{ trix: @entangle('article.content').defer }" class="mt-2">
                        <input id="content" type="hidden" value="{{ $article->content }}" />
                        <div wire:ignore>
                            <trix-editor x-model.debounce.300ms="trix" input="content" class="trix-content h-96 overflow-y-auto">
                            </trix-editor>
                        </div>
                    </div>
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

            @if($article->exists)
            <button class="btn-danger mx-4" wire:click="confirmDeletion" wire:loading.attr="disabled">
                Zmazať
            </button>
            @endif
            <x-jet-button>Uložiť</x-jet-button>
        </div>
    </div>

    <!-- Delete Confirmation Modal -->
    <x-jet-dialog-modal wire:model="confirmingDeletion">
        <x-slot name="title">
            Vymazať článok
        </x-slot>

        <x-slot name="content">
            Naozaj chcete vymazať tento článok?
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingDeletion')" wire:loading.attr="disabled">
                Zrušiť
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="delete" wire:loading.attr="disabled">
                Vymazať
            </x-jet-danger-button>
        </x-slot>
    </x-jet-dialog-modal>
</form>
