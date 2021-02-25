<div class="media-library-field">
    <label class="media-library-label">Dátum</label>
    <input
        class="media-library-input"
        type="date"
        required
        {{ $mediaItem->livewireCustomPropertyAttributes('date') }}
        x-on:change="$dispatch('keyup')" {{-- Trigger update event for MediaLibrary --}}
    />

    @error($mediaItem->customPropertyErrorName('date'))
    <span class="media-library-text-error">
       {{ $message }}
    </span>
    @enderror
</div>
<div class="media-library-field">
    {{ $mediaItem->name }}
</div>

