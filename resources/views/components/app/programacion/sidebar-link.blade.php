@props(['active'])

@php
    $common_clases = 'group w-full bg-transparent hover:bg-slate-400/10 py-2 px-2 space-y-2 text-sm rounded-md flex flex-col whitespace-nowrap soft-transition';
    $active_clases =(($active ?? false) ? 'text-blue-600' : 'text-slate-600');
@endphp

<div class="px-2 flex flex-col items-start w-full gap-y-1 pt-1">
    <a {{ $attributes->merge(['class' => $common_clases]) }}>
        <div class="w-full flex justify-between">
            <h2 class="font-semibold group-hover:text-blue-600 {{$active_clases}}">{{ $slot }}</h2>
            <div class="icon-5 overflow-hidden group-hover:text-blue-600 {{$active_clases}}">
                @if(isset($icon))
                    {{ $icon }}
                @endif
            </div>
        </div>
        <p class="text-sm text-slate-600 hover:text-slate-800 soft-transition">
            @if(isset($fechas))
                {{ $fechas }}
            @endif
        </p>
    </a>
</div>
