@props(['description'])
@php
    $common_clases = "w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600";
    $span_clases ="ml-3 text-sm font-medium text-gray-600";
@endphp
<label for="default-toggle" class="inline-flex relative items-center cursor-pointer">
    <input {{ $attributes->merge([
       'type' => 'checkbox',
       'id'=>'default-toggle',
       'class' => 'sr-only peer'])
       }}
    />
    <div class="{{$common_clases}}"></div>
    <span class="{{$span_clases}}">
       @if(isset($description))
            {{ $description }}
        @endif
    </span>
</label>
