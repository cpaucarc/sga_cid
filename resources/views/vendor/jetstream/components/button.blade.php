@props(['color'])

@php

    $btn_type = [
        'primary' => 'text-white bg-blue-3 border-blue-3 hover:bg-blue-4 hover:border-blue-4 active:border-blue-3 active:bg-blue-3',
        'warning' => 'text-gray-4 bg-amber-3 border-amber-3 hover:bg-amber-4 hover:border-amber-4 active:border-amber-3 active:bg-amber-3',
        'danger' => 'text-white bg-rose-3 border-rose-3 hover:bg-rose-4 hover:border-rose-4 active:border-rose-3 active:bg-rose-3',
    ][$color ?? 'primary'];

@endphp

<button {{ $attributes->merge([
    'type' => 'submit',
    'class' => $btn_type . ' btn disabled:opacity-25']) }}
>
    {{ $slot }}
</button>
