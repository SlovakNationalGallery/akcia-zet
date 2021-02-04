<form wire:submit.prevent="save">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-6">
                <div class="col-span-6 sm:col-span-4">
                    <x-admin.label for="title" value="Titulok" class="font-bold text-xl" required />
                    <x-jet-input id="title" type="text" class="mt-1 block w-full" wire:model.defer="article.title" />
                    <x-jet-input-error for="article.title" class="mt-2" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="slug" value="Slug (URL)" class="font-bold text-xl" />
                    <x-jet-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="article.slug" />
                    <x-jet-input-error for="article.slug" class="mt-2" />
                    <x-admin.input-hint>Ak je prázdny, bude vytvorený automaticky</x-admin.input-hint>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="perex" value="Perex" class="font-bold text-xl" />
                    <textarea class="w-full h-36 border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm mt-1" wire:model.defer="article.perex"></textarea>
                </div>

                <div class="col-span-6">
                    <x-jet-label for="content" value="Obsah" class="font-bold text-xl" />
                    <x-admin.quill-editor wire:model.defer="article.content" :value="$article->content" />
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="embed_url" value="Embed" class="font-bold text-xl" />
                    <x-jet-input
                    id="embed_url"
                    type="text"
                    class="mt-1 block w-full"
                    placeholder="https://www.youtube.com/watch?v=..."
                    wire:model.defer="article.embed_url"
                    wire:model="embedPreviewUrl"
                    />
                    <x-admin.input-hint>Link na video, podcast a pod.</x-admin.input-hint>

                    @if($embedPreviewUrl ?? $article->embed_url)
                        <div class="mt-4">
                            <x-admin.input-hint class="mb-2">Náhľad:</x-admin.input-hint>
                            <x-embed url="{{ $embedPreviewUrl ?? $article->embed_url }}" />
                        </div>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="tags" value="Tagy" class="font-bold text-xl" />
                    <x-admin.input-tags id="tags" wire:model.defer="tags" :available-tags="$this->availableTags" />
                    <x-jet-input-error for="tags" class="mt-2" />
                </div>

                {{-- filler --}}
                <div class="col-span-6 sm:col-span-2">
                </div>

                <div class="col-span-4 sm:col-span-2">
                    <label class="flex items-center cursor-pointer select-none">
                        <x-jet-checkbox wire:model.defer="article.published" />
                        <span class="ml-2 text-gray-600">Publikovať</span>
                    </label>
                    <x-jet-input-error for="article.published" class="mt-2" />
                </div>
            </div>
        </div>
        <div class="flex items-center justify-between px-4 py-3 bg-gray-50 text-right sm:px-6">
            <div>
                @if($article->exists)
                <button type="button" class="btn-danger" wire:click="confirmDeletion" wire:loading.attr="disabled">
                    Zmazať
                </button>
                @endif
            </div>
            <div class="flex items-center">
                <x-jet-action-message class="mr-3" on="saved">
                    Zmeny boli uložené
                </x-jet-action-message>
                @if($article->exists)
                    <a href="{{ route('admin.articles.show', $article )}}" class="btn-secondary mx-4" target="_blank">
                        Náhľad
                    </a>
                @endif
                <x-jet-button>Uložiť</x-jet-button>
            </div>
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
