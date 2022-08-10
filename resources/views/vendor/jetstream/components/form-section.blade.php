@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-3 md:gap-6']) }}>
    <x-jet-section-title>
        <x-slot name="title">{{ $title }}</x-slot>
        <x-slot name="description">{{ $description }}</x-slot>
    </x-jet-section-title>

    <div class="mt-5 md:mt-0 md:col-span-2 rounded-md bg-white border border-gray-1/50">
        <form wire:submit.prevent="{{ $submit }}">
            <div
                class="px-4 py-5 sm:p-6 {{ isset($actions) ? 'sm:rounded-tl-md sm:rounded-tr-md' : 'sm:rounded-md' }}">
                <div class="grid grid-cols-6 gap-6">
                    {{ $form }}
                </div>
            </div>

            @if (isset($actions))
                <div
                    class="flex items-center border-t border-gray-1/50 justify-end px-4 py-3 text-right sm:px-6 sm:rounded-bl-md sm:rounded-br-md">
                    {{ $actions }}
                </div>
            @endif
        </form>
    </div>
</div>
