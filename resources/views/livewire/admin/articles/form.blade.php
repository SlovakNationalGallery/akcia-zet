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
                    <x-admin.input-hint>Ak je prázdny, bude vytvorený automaticky</x-admin.input-hint>
                    <x-jet-input id="slug" type="text" class="mt-1 block w-full" wire:model.defer="article.slug" />
                    <x-jet-input-error for="article.slug" class="mt-2" />
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
                    <x-admin.input-hint>Link na video, podcast a pod.</x-admin.input-hint>
                    <x-jet-input
                        id="embed_url"
                        type="text"
                        class="mt-1 block w-full"
                        placeholder="https://www.youtube.com/watch?v=..."
                        wire:model.defer="article.embed_url"
                        wire:model="embedPreviewUrl"
                    />

                    @if($embedPreviewUrl ?? $article->embed_url)
                        <div class="mt-4">
                            <x-admin.input-hint class="mb-2">Náhľad:</x-admin.input-hint>
                            <x-extended-embed url="{{ $embedPreviewUrl ?? $article->embed_url }}" />
                        </div>
                    @endif
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="images" value="Galéria" class="font-bold text-xl" />
                    <x-admin.input-hint>Obrázky na zobrazenie v carouseli</x-admin.input-hint>
                    <div class="mt-1">
                        <x-media-library-collection
                            id="images"
                            name="images"
                            :model="$article"
                            collection="images"
                            rules="mimes:jpeg,png"
                        />
                    </div>
                </div>

                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="attachments" class="font-bold text-xl">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 -mt-1 inline" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                        </svg>
                        Prílohy
                    </x-jet-label>

                    <x-admin.input-hint>Súbory, na ktoré sa dá odkazovať v článku.<br/> (Pravý klik na odkaz "Download" -> skopírovať odkaz)</x-admin.input-hint>
                    <div class="mt-1">
                        <x-media-library-collection
                            id="attachments"
                            name="attachments"
                            :model="$article"
                            collection="attachments"
                        />
                    </div>
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
                    <x-jet-label for="published_at" value="Dátum zverejnenia" class="font-bold text-xl" />
                    <div class="flex flex-row items-baseline">
                        <x-jet-input id="published_at" type="date" class="mt-1 block w-48" wire:model="article.published_at" />
                        <a
                            href="#"
                            class="text-indigo-700 ml-2"
                            x-show="published_at"
                            x-data="{ published_at: @entangle('article.published_at') }"
                            @click.prevent="published_at = null"
                        >Zrušiť</a>
                    </div>
                    <x-jet-input-error for="article.published_at" class="mt-2" />
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
