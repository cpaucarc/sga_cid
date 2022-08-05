@props(['tipo' => 'warning'])

@php
    $clase = [
        'warning' => 'bg-amber-300',
        'danger' => 'bg-rose-200',
        'success' => 'bg-lime-200',
        'info' => 'bg-blue-200',
    ][$tipo ?? 'warning']
@endphp

<div class="{{ $clase }} rounded-md px-4 py-3 flex items-center gap-x-4 text-sm text-slate-900">
    @if($tipo == 'warning')
        <x-icons.warning class="icon-6"/>
    @endif
    <div {{ $attributes }}>
        {{ $slot }}
    </div>
</div>
