<div>
    <x-titulo titulo="Docentes del Centro de Idiomas">
        @slot('items')
            <x-links.primary href="{{ route('docente.registrar') }}">{{ __('Registrar Docente') }}</x-links.primary>
        @endslot
    </x-titulo>
    <div class="flex items-center justify-between mb-4">
        <x-forms.search-input wire:model.debounce.500ms="search"/>
        <x-forms.toogle wire:model="inactivo"/>
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
                        <x-links.secondary href="{{ route('docente.show',$docente->codigo) }}"
                                           class="btn-state-transparent">
                            {{$docente->persona->apellido_paterno}} {{$docente->persona->apellido_materno}} {{$docente->persona->nombres}}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column>
                        <x-links.secondary
                            class="{{ $docente->idiomas_count == 0 ? 'btn-state-danger' :'btn-state-default'}}"
                            href="{{ route('docente.idioma',$docente->codigo) }}">
                            {{$docente->idiomas_count}} {{ $docente->idiomas_count == 1 ? "idioma" : "idiomas" }}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column>
                        <x-jet-secondary-button wire:click="cambiarEstado({{ $docente->id }},{{$docente->esta_activo}})"
                                                class="{{ $docente->esta_activo ? 'btn-state-default' :'btn-state-danger'}}">
                            {{ $docente->esta_activo ? "Activo" : "Inactivo" }}
                        </x-jet-secondary-button>
                    </x-table.column>
                    <x-table.column>
                        <x-links.secondary class="btn-state-warning"
                                           href="{{ route('docente.editar',$docente->codigo) }}">
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
        No hay docentes
    @endif
</div>
