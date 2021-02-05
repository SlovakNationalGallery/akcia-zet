<form wire:submit.prevent="save">
    <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="col-span-6 sm:col-span-4">
                <x-admin.input-hint>Názvy sa nezobrazia</x-admin.input-hint>
                <div class="mt-1">
                    <x-media-library-collection
                        id="images"
                        name="images"
                        :model="$setting"
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
