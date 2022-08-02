@props(['active'])

@php
    $common_clases = 'py-2 px-2 text-sm rounded-md flex flex-1 w-full items-center justify-between whitespace-nowrap cursor-pointer soft-transition ';
    $classes = $common_clases . (($active ?? false)
                ? 'relative bg-blue-500/10 text-blue-800 font-semibold tracking-wide'
                : 'bg-transparent hover:bg-slate-400/10 text-slate-600 hover:text-slate-800');
@endphp

<div class="px-2 flex flex-col items-start w-full gap-y-1 pt-1">
    <a {{ $attributes->merge(['class' => $classes]) }}>
        @if($active)
            <div class="absolute -left-2 h-6 w-1 bg-blue-500 rounded-md"></div>
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
