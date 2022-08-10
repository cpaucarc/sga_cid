<div class="space-y-4">
    <x-titulo titulo="Autoridades del Centro de Idiomas">
        @slot('items')
            <x-links.primary href="{{ route('autoridad.registrar') }}">{{ __('Registrar Autoridad') }}</x-links.primary>
        @endslot
    </x-titulo>

    <div class="flex items-center justify-between mb-4">
        <x-forms.search-input wire:model.debounce.500ms="search"/>
        <x-forms.toggle id="avc" textoIzq="Solo activos" textoDer="Todos" wire:model="inactivo"/>
    </div>

    @if(count($autoridades) > 0)
        <x-table.table>
            @slot('head')
                <x-table.head>Dni</x-table.head>
                <x-table.head>Autoridad</x-table.head>
                <x-table.head>Correo</x-table.head>
                <x-table.head>Cargo</x-table.head>
                <x-table.head>Estado</x-table.head>
                <x-table.head><span class="sr-only">Acciones</span></x-table.head>
            @endslot
            @foreach($autoridades as $autoridad)
                <x-table.row>
                    <x-table.column>{{$autoridad->persona->dni}}</x-table.column>
                    <x-table.column>
                        <x-links.secondary href="{{ route('autoridad.show',$autoridad->persona->dni) }}">
                            {{$autoridad->persona->apellido_paterno}} {{$autoridad->persona->apellido_materno}} {{$autoridad->persona->nombres}}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column>{{$autoridad->persona->correo}}</x-table.column>
                    <x-table.column>{{ $cargos[$autoridad->autoridad_cargo_id] }}</x-table.column>
                    <x-table.column>
                        <div class="flex items-center gap-x-1">
                            <p class="{{ $autoridad->esta_activo ? 'text-gray-3' : 'text-rose-3'}}">
                                {{ $autoridad->esta_activo ? "Activo" : "Inactivo" }}
                            </p>
                            <x-jet-secondary-button
                                title="Cambiar estado a {{ $autoridad->esta_activo ? 'Inactivo' : 'Activo' }}"
                                wire:click="cambiarEstado({{ $autoridad->id }},{{$autoridad->esta_activo}})">
                                <x-icons.refresh class="icon-4" stroke="2"/>
                            </x-jet-secondary-button>
                        </div>
                    </x-table.column>
                    <x-table.column>
                        <x-links.secondary href="{{ route('autoridad.editar', $autoridad->persona->dni) }}">
                            <x-icons.edit class="icon-5"/>
                            Editar
                        </x-links.secondary>
                    </x-table.column>
                </x-table.row>
            @endforeach
        </x-table.table>
    @else
        <x-empty-state :w-text="5" title="No se encontró ninguna autoridad en los registros"
                       description="No existen autoridades registrados o activos que mostrar."/>
    @endif
</div>
