@props(['textoIzq', 'textoDer', 'id'])

@php
    $id = $id ?? 'default-toggle';
    $common_clases = "w-9 h-5 bg-gray-1 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-1 after:border after:rounded-full after:h-4 after:w-4 after:transition-all peer-checked:bg-blue-3";
    $span_clases ="text-sm font-medium text-gray-3";
@endphp

<div class="inline-flex items-center">
    @if(isset($textoIzq))
        <label for="{{ $id }}" class="cursor-pointer {{ $span_clases }} mr-2">{{ $textoIzq }}</label>
    @endif

    <label for="{{ $id }}" class="inline-flex relative items-center cursor-pointer">
        <input {{ $attributes->merge([ 'type' => 'checkbox', 'id' => $id, 'class' => 'sr-only peer']) }}/>
        <div class="{{$common_clases}}"></div>
    </label>

    @if(isset($textoDer))
        <label for="{{ $id }}" class="cursor-pointer {{ $span_clases }} ml-2">{{ $textoDer }}</label>
    @endif
</div>
