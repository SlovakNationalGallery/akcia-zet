@props(['id', 'availableTags'])

<div
    x-data="{
        tags: @entangle($attributes->wire('model')).defer,
        availableTags: {{ json_encode($availableTags) }},
        input: '',
        open: false,
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
            id="{{ $id }}"
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

        <template x-for="(tag, index) in tags" :key="tag">
            <div
                x-transition:enter="transition ease-out duration-300"
                x-transition:enter-start="opacity-0 transform scale-90"
                x-transition:enter-end="opacity-100 transform scale-100"
                class="bg-indigo-100 inline-flex items-center text-sm rounded mt-2 mr-1"
            >
                <span class="ml-2 mr-1 leading-relaxed truncate max-w-xs" x-text="tag"></span>
                <button @click.prevent="tags.splice(index, 1)"
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
