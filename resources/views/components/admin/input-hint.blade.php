@props(['value'])

<p {{ $attributes->merge(['class' => 'font-medium text-sm text-gray-500']) }}>
    {{ $value ?? $slot }}
</p>
