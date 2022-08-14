<div {{ $attributes->merge(['class' => 'flex flex-col items-start w-full gap-y-1']) }}>
    @if(isset($titulo))
        <p class="text-sm text-gray-4/60 font-semibold tracking-wide">{{ $titulo }}</p>
    @endif

    {{ $slot }}

</div>
