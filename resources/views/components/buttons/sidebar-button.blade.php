@props(['active'])

@php
    $classes = ($active ?? false)
                ? 'font-semibold text-blue-3 bg-blue-3/10'
                : 'font-medium text-gray-3/80 hover:text-gray-4 bg-transparent hover:bg-gray-1/40';
@endphp

<button {{ $attributes->merge(['class' => $classes . ' rounded w-full flex gap-x-3 items-center px-2 py-1 text-sm leading-5 focus:outline-none soft-transition']) }}>
    @if(isset($icon))
        <div class="icon-6 overflow-hidden grid place-items-center">
            {{ $icon }}
        </div>
    @endif

    {{ $slot }}
</button>
