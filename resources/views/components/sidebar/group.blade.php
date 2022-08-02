<div {{ $attributes->merge(['class' => 'flex flex-col items-start w-full gap-y-1']) }}>
    @if(isset($titulo))
    <p class="ml-3 text-sm text-slate-400 font-semibold tracking-wide">{{ $titulo }}</p>
    @endif

    {{ $slot }}

</div>
