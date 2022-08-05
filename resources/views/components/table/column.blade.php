@props(['hide'])

@php
    $clases = (isset($hide) && $hide) ? [
        'sm' => ' hidden sm:table-cell ',
        'md' => ' hidden md:table-cell ',
        'lg' => ' hidden lg:table-cell '
    ][$hide == 1 ? 'lg' : $hide] : '';
@endphp

<td {{ $attributes->merge(['class' => 'px-4 py-3' . $clases]) }}>
    {{ $slot }}
</td>
