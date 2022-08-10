@props(['tipo' => 'warning'])

@php
    $clase = [
        'warning' => 'bg-amber-3 text-gray-4',
        'danger' => 'bg-rose-3 text-white',
        'success' => 'bg-green-3 text-white',
        'info' => 'bg-blue-3 text-white',
    ][$tipo ?? 'warning']
@endphp

<div class="{{ $clase }} rounded px-4 py-3 flex items-center gap-x-4 text-sm font-semibold">
    @if($tipo == 'info')
        <x-icons.info class="icon-6"/>
    @endif
    @if($tipo == 'warning')
        <x-icons.warning class="icon-6"/>
    @endif
    @if($tipo == 'danger')
        <x-icons.exclamation class="icon-6"/>
    @endif
    @if($tipo == 'success')
        <x-icons.quality class="icon-6"/>
    @endif
    <div {{ $attributes }}>
        {{ $slot }}
    </div>
</div>
