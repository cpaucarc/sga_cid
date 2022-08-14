<section {{ $attributes->merge(['class' => 'border-b border-dashed border-gray-2/70 pb-3']) }}>
    <div class="flex items-center justify-between gap-x-6">
        <div>
            <h1 class="font-bold text-gray-4 text-lg">
                {{ $titulo }}
            </h1>
            @if(isset($subtitulo))
                <p class="text-gray-3 text-sm">
                    {{ $subtitulo }}
                </p>
            @endif
        </div>

        @if(isset($items))
            <div class="flex items-center gap-x-2 justify-end">
                {{ $items }}
            </div>
        @endif
    </div>
</section>
