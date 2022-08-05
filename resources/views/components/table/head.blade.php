@props(['hide'])

@php
    $clases = (isset($hide) && $hide) ? [
        'sm' => ' hidden sm:table-cell ',
        'md' => ' hidden md:table-cell ',
        'lg' => ' hidden lg:table-cell '
    ][$hide == 1 ? 'lg' : $hide] : '';
@endphp

<th {{ $attributes->merge(['scope' => 'col', 'class' => 'px-4 py-2 text-xs font-semibold text-slate-600 uppercase tracking-wider' . $clases]) }}>
    {{ $slot }}
</th>
