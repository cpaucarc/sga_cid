<div class="flex gap-x-2 items-center">
    <x-jet-input type="number" min="2010" max="{{ now()->year }}" step="1" wire:model="year"/>
    <x-forms.select wire:model="mes">
        @if(count($mensuales))
            <option value="0">Seleccione</option>
        @endif
        @forelse($mensuales as $msl)
            <option value="{{ $msl->mes_id }}">{{ $meses[$msl->mes_id] }}</option>
        @empty
            <option value="0">No hay ningún mes</option>
        @endforelse
    </x-forms.select>
</div>
