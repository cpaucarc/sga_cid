<div {{ $attributes->merge(['class' => 'flex flex-col items-start w-full gap-y-1']) }}>
    @if(isset($titulo))
        <p class="ml-3 text-xs text-gray-2/70 uppercase tracking-wide">{{ $titulo }}</p>
    @endif

    {{ $slot }}

</div>
