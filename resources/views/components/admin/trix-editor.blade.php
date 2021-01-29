@props(['value' => ''])

@php
$id = md5($attributes->wire('model'));
@endphp

<div
    x-data="{
        trix: @entangle($attributes->wire('model')).defer,
        handleAction(event) {
            if (event.actionName === 'x-embed') {
                const content = event.target.toolbarElement.querySelector(`[data-trix-input-x-embed]`).value
                const attachment = new Trix.Attachment({content})
                event.target.editor.insertAttachment(attachment)
            }
        }
    }"
>
    <input id="{{ $id }}" type="hidden" value="{{ $value }}" />
    <div wire:ignore>
        <trix-editor
            @trix-action-invoke="handleAction($event)"
            x-model.debounce.300ms="trix" input="{{ $id }}" {{ $attributes->merge(['class' => 'trix-content overflow-y-auto mt-2']) }}>
        </trix-editor>
    </div>
</div>
