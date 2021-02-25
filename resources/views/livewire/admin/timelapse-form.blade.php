<form wire:submit.prevent="save">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6 grid grid-cols-6 gap-6">
            <div class="col-span-6 sm:col-span-4">
                <p class="font-medium text-sm text-gray-500">
                    Priestor na nahrávanie obrázkov do "časozberu" na titulke.
                    Obrázky budú automaticky zoradené podľa dátumu.
                </p>
            </div>
            <div class="col-span-6">
                <div class="mt-1">
                    <x-media-library-collection
                        id="images"
                        name="images"
                        :model="$setting"
                        :sortable="false"
                        collection="timelapse"
                        rules="mimes:jpeg,png"
                        fields-view="components.admin.media-library-date-input"
                    />
                </div>
            </div>
        </div>
        <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
            <div class="flex items-center">
                <x-jet-action-message class="mr-3" on="saved">
                    Zmeny boli uložené
                </x-jet-action-message>
                <x-jet-button>Uložiť</x-jet-button>
            </div>
        </div>
    </div>
</form>
