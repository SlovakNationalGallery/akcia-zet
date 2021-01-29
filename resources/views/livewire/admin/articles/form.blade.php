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




                <div class="col-span-6 sm:col-span-4">
                    <x-jet-label for="tags" value="Tagy" class="font-bold" />
                    <div
                        x-data="{
                            tags: @entangle('tags'),
                            availableTags: {{ json_encode($this->availableTags) }},
                            input: '',
                            open: false,
                            close() {
                                this.$nextTick(() => { this.open = false })
                            },
                            getMatchingTags() {
                                return this.availableTags
                                    .filter(tag => tag.includes(this.input))
                                    .filter(tag => !this.tags.includes(tag))
                                    .slice(0,3)
                            },
                            addTag(tag) {
                                this.tags.push(tag)
                            }
                        }"
                    >
                        <div class="relative" @keydown.enter.prevent="addTag(textInput)">
                            <x-jet-input
                                id="tags"
                                type="text"
                                x-model="input"
                                class="mt-1 block w-full"
                                @focus="open = true"
                                @click.away="open = false"
                            />
                            <div :class="[open ? 'block' : 'hidden']">
                                <div class="absolute z-40 left-0 mt-2 w-full">
                                    <div class="py-1 text-sm bg-white rounded shadow-lg border border-gray-300">
                                        <template x-if="open" x-for="tag in getMatchingTags()" :key="tag">
                                            <a
                                                x-text="tag"
                                                @click.prevent="addTag(tag)"
                                                class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white"
                                            ></a>
                                        </template>
                                        <a
                                            x-show="input && !availableTags.includes(input)"
                                            @click.prevent="addTag(input)"
                                            class="block py-1 px-5 cursor-pointer hover:bg-indigo-600 hover:text-white"
                                        >
                                            Pridať tag "<span class="font-semibold" x-text="input"></span>"
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <template
                                x-for="(tag, index) in tags"
                                :key="tag"
                            >
                                <div
                                    x-transition:enter="transition ease-out duration-300"
                                    x-transition:enter-start="opacity-0 transform scale-90"
                                    x-transition:enter-end="opacity-100 transform scale-100"
                                    class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1">
                                    <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
                                    <button @click.prevent="tags.splice(index,1)"
                                        class="w-6 h-8 inline-block align-middle text-gray-500 hover:text-gray-600 focus:outline-none">
                                        <svg class="w-6 h-6 fill-current mx-auto" xmlns="http://www.w3.org/2000/svg"
                                            viewBox="0 0 24 24">
                                            <path fill-rule="evenodd"
                                                d="M15.78 14.36a1 1 0 0 1-1.42 1.42l-2.82-2.83-2.83 2.83a1 1 0 1 1-1.42-1.42l2.83-2.82L7.3 8.7a1 1 0 0 1 1.42-1.42l2.83 2.83 2.82-2.83a1 1 0 0 1 1.42 1.42l-2.83 2.83 2.83 2.82z" />
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                    </div>
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

    </div>

    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
        <x-jet-action-message class="mr-3" on="saved">
            Zmeny boli uložené
        </x-jet-action-message>

        @if($article->exists)
        <button type="button" class="btn-danger mx-4" wire:click="confirmDeletion" wire:loading.attr="disabled">
            Zmazať
        </button>
        @endif
        <x-jet-button>Uložiť</x-jet-button>
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
