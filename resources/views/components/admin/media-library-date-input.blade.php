@include('media-library::livewire.partials.collection.fields')

<div class="media-library-field">
    <label class="media-library-label">Dátum</label>
    <input
        class="media-library-input"
        type="date"
        required
        {{ $mediaItem->livewireCustomPropertyAttributes('date') }}
        x-on:change.debounce.150="$wire.setCustomProperty('{{ $mediaItem->uuid }}', 'date', document.getElementsByName('{{ $mediaItem->customPropertyAttributeName('date') }}')[0].value)"',
    />

    @error($mediaItem->customPropertyErrorName('date'))
    <span class="media-library-text-error">
       {{ $message }}
    </span>
    @enderror
</div>
