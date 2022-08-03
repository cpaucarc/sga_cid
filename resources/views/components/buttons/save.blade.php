@props(['target'])

<x-jet-button
    wire:click="{{ $target }}"
    wire:target="{{ $target }}"
    wire:loading.class="cursor-wait"
    wire:loading.attr="disabled">
    <x-icons.loading wire:loading wire:target="{{ $target }}" class="icon-5"/>
    <span wire:loading.remove wire:target="{{ $target }}">Guardar datos</span>
    <span wire:loading wire:target="{{ $target }}">Guardando...</span>
</x-jet-button>
