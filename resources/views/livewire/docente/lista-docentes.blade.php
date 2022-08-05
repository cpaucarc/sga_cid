<div>
    <x-titulo titulo="Docentes del Centro de Idiomas">
        @slot('items')
            <x-links.primary href="{{ route('docente.registrar') }}">{{ __('Nuevo') }}</x-links.primary>
        @endslot
    </x-titulo>
    @if(count($docentes)>0)
        <div class="flex justify-end">
            <label for="default-toggle" class="inline-flex relative items-center mb-4 cursor-pointer">
                <input type="checkbox" value="" id="default-toggle" class="sr-only peer" wire:model="esta_activo">
                <div
                    class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900">Todos</span>
            </label>
        </div>
        <x-table.table>
            @slot('head')
                <x-table.head>Código</x-table.head>
                <x-table.head>Apellidos y Nombres</x-table.head>
                <x-table.head>DNI</x-table.head>
                <x-table.head>Correo</x-table.head>
                <x-table.head>Idiomas</x-table.head>
                <x-table.head>Estado</x-table.head>
                <x-table.head><span class="sr-only">Acciones</span></x-table.head>
            @endslot
            @foreach($docentes as $docente)
                <x-table.row>
                    <x-table.column class="uppercase">{{ $docente->persona->codigo }}</x-table.column>
                    <x-table.column class="uppercase">
                        <x-links.secondary href="{{ route('docente.show',$docente->uuid) }}"
                                           class="btn-state-transparent">
                            {{$docente->persona->apellido_paterno}} {{$docente->persona->apellido_materno}} {{$docente->persona->nombres}}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column class="whitespace-nowrap">{{$docente->persona->dni}}</x-table.column>
                    <x-table.column class="whitespace-nowrap">{{$docente->persona->correo}}</x-table.column>
                    <x-table.column>
                        <x-links.secondary
                            class="{{ $docente->idiomas_count == 0 ? 'btn-state-danger' :'btn-state-default'}}"
                            href="{{ route('docente.idiomas',$docente->uuid) }}">
                            {{$docente->idiomas_count}} {{ $docente->idiomas_count == 1 ? "idioma" : "idiomas" }}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column>
                        <x-links.secondary
                            class="{{ $docente->esta_activo ? 'btn-state-success' :'btn-state-danger'}}">
                            {{ $docente->esta_activo ? "Habilitado" : "Inhabilitado" }}
                        </x-links.secondary>
                    </x-table.column>
                    <x-table.column>
                        <x-jet-secondary-button class="btn-state-warning">
                           Editar
                        </x-jet-secondary-button>
                    </x-table.column>
                </x-table.row>
            @endforeach
        </x-table.table>
    @else
        No hay docentes
    @endif
</div>
