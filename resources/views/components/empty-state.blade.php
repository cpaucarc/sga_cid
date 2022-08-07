@props(['wImage', 'wText', 'image', 'title', 'description', 'actions'])

@php
    $widths = [
        '1' => 'w-1/5',
        '2' => 'w-2/5',
        '3' => 'w-3/5',
        '4' => 'w-4/5',
        '5' => 'w-full',
    ];

    $widthImage = $widths[$wImage ?? '2'];
    $widthText = $widths[$wText ?? '3'];
@endphp

<div class="grid place-items-center px-5 py-4 border border-slate-300 rounded-md">
    <div class="flex flex-col gap-y-2 items-center justify-center">
        @if(isset($image))
            <img class="{{ $widthImage }}" src="{{ $image }}" alt="Imagen correspondiente">
        @endif

        @if(isset($title) or isset($description))
            <div class="{{ $widthText }} text-center">
                @if(isset($title))
                    <h2 class="font-bold text-slate-800 leading-tight">
                        {{ $title }}
                    </h2>
                @endif
                @if(isset($description))
                    <h3 class="text-slate-600 text-sm mt-1 leading-tight">
                        {{ $description }}
                    </h3>
                @endif
            </div>
        @endif

        @if(isset($actions))
            <div class="flex flex-wrap justify-center gap-2">
                {{ $actions }}
            </div>
        @endif
    </div>
</div>
