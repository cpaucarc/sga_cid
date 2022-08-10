@props(['active'])

@php
    $common_clases = ' py-2 px-2 text-sm rounded flex flex-1 w-full items-center justify-between whitespace-nowrap cursor-pointer soft-transition ';
    $classes = ($active ?? false)
                ? 'relative bg-[#EBEFFD] text-blue-3 font-semibold tracking-wide'
                : 'bg-transparent hover:bg-gray-1/30 text-gray-3 hover:text-gray-4';
@endphp

<div class="px-2 flex flex-col items-start w-full gap-y-1 pt-1">
    <a {{ $attributes->merge(['class' => $classes . $common_clases]) }}>
        @if($active)
            <div class="absolute -left-2 h-6 w-1 bg-blue-3 rounded"></div>
        @endif

        <div class="flex items-center gap-x-2">
            <div class="icon-5 overflow-hidden">
                @if(isset($icon))
                    {{ $icon }}
                @endif
            </div>

            {{ $slot }}
        </div>
    </a>
</div>
