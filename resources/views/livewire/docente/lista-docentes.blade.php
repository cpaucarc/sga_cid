<div class="space-y-4">
    <x-titulo titulo="Docentes del Centro de Idiomas">
        @slot('items')
            <x-links.primary href="{{ route('docente.registrar') }}">{{ __('Registrar Docente') }}</x-links.primary>
        @endslot
    </x-titulo>

    <div class="flex items-center justify-between mb-4">
        <x-forms.search-input wire:model.debounce.500ms="search"/>
        <x-forms.toggle id="avc" textoIzq="Solo activos" textoDer="Todos" wire:model="inactivo"/>
    </div>

    @if(count($docentes)>0)
        <x-table.table>
            @slot('head')
                <x-table.head>Dni</x-table.head>
                <x-table.head>Código</x-table.head>
                <x-table.head>Docente</x-table.head>
                <x-table.head>Idiomas</x-table.head>
                <x-table.head>Estado</x-table.head>
                <x-table.head><span class="sr-only">Acciones</span></x-table.head>
            @endslot
            @foreach($docentes as $docente)
                <x-table.row>
                    <x-table.column class="whitespace-nowrap">{{$docente->persona->dni}}</x-table.column>
                    <x-table.column class="whitespace-nowrap">{{ $docente->codigo }}</x-table.column>
                    <x-table.column class="uppercase">
                        <x-links.secondary href="{{ route('docente.show',$docente->codigo) }}">
                            {{$docente->persona->apellido_paterno}} {{$docente->persona->apellido_materno}} {{$docente->persona->nombres}}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column>
                        <x-links.secondary href="{{ route('docente.idioma',$docente->codigo) }}"
                                           color="{{ $docente->idiomas_count == 0 ? 'danger' : 'primary'}}">
                            {{$docente->idiomas_count}} {{ $docente->idiomas_count == 1 ? "idioma" : "idiomas" }}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column>
                        <div class="flex items-center gap-x-1">
                            <p class="{{ $docente->esta_activo ? 'text-gray-3' : 'text-rose-3'}}">
                                {{ $docente->esta_activo ? "Activo" : "Inactivo" }}
                            </p>
                            <x-jet-secondary-button
                                title="Cambiar estado a {{ $docente->esta_activo ? 'Inactivo' : 'Activo' }}"
                                wire:click="cambiarEstado({{ $docente->id }},{{$docente->esta_activo}})">
                                <x-icons.refresh class="icon-4" stroke="2"/>
                            </x-jet-secondary-button>
                        </div>
                    </x-table.column>
                    <x-table.column>
                        <x-links.secondary href="{{ route('docente.editar',$docente->codigo) }}">
                            <x-icons.edit class="icon-5"/>
                            Editar
                        </x-links.secondary>
                    </x-table.column>
                </x-table.row>
            @endforeach
        </x-table.table>
    @else
        <x-empty-state :w-text="5">
            <x-slot:title>Lista de docentes</x-slot:title>
            <x-slot:description>No existen docentes registrados o activos.</x-slot:description>
        </x-empty-state>
    @endif
</div>
