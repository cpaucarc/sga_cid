<div
    {{ $attributes->merge(['class' => "bg-white border border-gray-1 divide-y divide-gray-1 rounded-md text-gray-3"]) }}>
    @if(isset($header))
        <div class="px-3 py-3 rounded-t bg-white">
            {{ $header }}
        </div>
    @endif

    <div class="px-3 py-3">
        {{ $slot }}
    </div>

    @if(isset($footer))
        <div class="px-3 py-3 bg-gray-1/50 rounded-b">
            {{ $footer }}
        </div>
    @endif
</div>
