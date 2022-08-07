<div class="grid grid-cols-10 gap-8 items-start">
    {{-- Sidebar con links --}}
    <div class="col-span-2 sticky top-28 -mt-2">
        <div class="flex flex-col items-start gap-y-6 divide-slate-200 divide-y">
            {{ $sidebar }}
        </div>
    </div>

    {{-- Contenido --}}
    <div class="col-span-8">
        @if( !isset($aside))
            {{ $slot }}
        @else
            <div class="grid grid-cols-10 gap-6">
                <div class="col-span-7">
                    {{ $slot }}
                </div>

                <div class="col-span-3 sticky top-28 -mt-2">
                    {{ $aside }}
                </div>
            </div>
        @endif
    </div>

</div>
