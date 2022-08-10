@props(['color'])

@php
    $clases = [
        'primary' => 'text-gray-3 hover:text-blue-3',
        'danger' => 'text-rose-3 hover:text-rose-3',
        'dark' => 'text-gray-3 hover:text-gray-4',
    ][$color ?? 'primary'];
@endphp

<a {{ $attributes->merge(['class' => 'link-secondary text-gray-3 disabled:opacity-25 ' . $clases]) }}>
    {{ $slot }}
</a>
