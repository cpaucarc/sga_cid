<div>
    <x-titulo titulo="Autoridades del Centro de Idiomas">
        @slot('items')
            <x-links.primary href="{{ route('autoridad.registrar') }}">{{ __('Registrar Autoridad') }}</x-links.primary>
        @endslot
    </x-titulo>
    <div class="flex items-center justify-between mb-4">
        <x-forms.search-input wire:model.debounce.500ms="search"/>
        <x-forms.toggle id="avc" textoIzq="Solo activos" textoDer="Todos" wire:model="inactivo"/>
    </div>
    @if(count($autoridades)>0)
        <x-table.table>
            @slot('head')
                <x-table.head>Dni</x-table.head>
                <x-table.head>Autoridad</x-table.head>
                <x-table.head>Correo</x-table.head>
                <x-table.head>Estado</x-table.head>
                <x-table.head><span class="sr-only">Acciones</span></x-table.head>
            @endslot
            @foreach($autoridades as $autoridad)
                <x-table.row>
                    <x-table.column class="whitespace-nowrap">{{$autoridad->persona->dni}}</x-table.column>
                    <x-table.column class="uppercase">
                        <x-links.secondary href="{{ route('autoridad.show',$autoridad->persona->dni) }}"
                                           class="btn-state-transparent">
                            {{$autoridad->persona->apellido_paterno}} {{$autoridad->persona->apellido_materno}} {{$autoridad->persona->nombres}}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column class="whitespace-nowrap">{{$autoridad->persona->correo}}</x-table.column>
                    <x-table.column>
                        <x-jet-secondary-button
                            wire:click="cambiarEstado({{ $autoridad->id }},{{$autoridad->esta_activo}})"
                            class="{{ $autoridad->esta_activo ? 'btn-state-default' :'btn-state-danger'}}">
                            {{ $autoridad->esta_activo ? "Activo" : "Inactivo" }}
                        </x-jet-secondary-button>
                    </x-table.column>
                    <x-table.column>
                        <x-links.secondary class="btn-state-warning"
                                           href="{{ route('autoridad.editar', $autoridad->persona->dni) }}">
                            <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                        </x-links.secondary>
                    </x-table.column>
                </x-table.row>
            @endforeach
        </x-table.table>
    @else
        <x-empty-state :w-text="5">
            <x-slot:title>Lista de autoridades</x-slot:title>
            <x-slot:description>No existen autoridades registrados o activos.</x-slot:description>
        </x-empty-state>
    @endif
</div>
