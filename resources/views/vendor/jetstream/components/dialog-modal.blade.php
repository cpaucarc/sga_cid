@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    @if(isset($title))
        <div class="text-lg border-b border-gray-1 px-6 py-3 text-gray-3">
            {{ $title }}
        </div>
    @endif

    <div class="px-6 py-5">
        {{ $content }}
    </div>

    @if(isset($footer))
        <div class="flex flex-row justify-end gap-x-2 px-6 py-3 bg-gray-1/20 text-right">
            {{ $footer }}
        </div>
    @endif
</x-jet-modal>
