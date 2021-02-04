@props(['value' => ''])

<div
    x-data="{ content: @entangle($attributes->wire('model')).defer }"
    x-on:text-change="content = $event.detail.content"
    x-init="initQuill($refs.editor, $dispatch)"
>
    <div wire:ignore>
        <div x-ref="editor">{!! $value !!}</div>
    </div>
</div>
