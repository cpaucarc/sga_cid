<div class="space-y-4">

    <x-titulo titulo="Idiomas Dictables"/>

    <div class="flex space-x-2 items-center justify-end">
        <x-forms.select wire:model="idioma">
            <option value="0">Todos los idiomas</option>
            @foreach($idiomas as $idi => $idm)
                <option value="{{ $idi }}">{{ $idm }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.select wire:model="nivel">
            <option value="0">Todos los niveles</option>
            @foreach($niveles as $idn => $nv)
                <option value="{{ $idn }}">Nivel {{ $nv }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.select wire:model="modalidad">
            <option value="0">Todas las modalidades</option>
            @foreach($modalidades as $idm => $mdl)
                <option value="{{ $idm }}">{{ $mdl }}</option>
            @endforeach
        </x-forms.select>
    </div>

    <x-table.table>
        @slot('head')
            <x-table.head>Código</x-table.head>
            <x-table.head>Pre-requisito</x-table.head>
            <x-table.head>Idioma - Nivel - Modalidad</x-table.head>
            <x-table.head class="text-right">Precio Mensual</x-table.head>
            <x-table.head>Duración</x-table.head>
            <x-table.head class="text-center">Cursos</x-table.head>
            <x-table.head><span class="sr-only">Acciones</span></x-table.head>
        @endslot

        @foreach($idiomas_dictables as $idioma_dictable)
            <x-table.row>
                <x-table.column class="uppercase">{{ $idioma_dictable->codigo }}</x-table.column>
                <x-table.column class="uppercase">{{ $idioma_dictable->requisito ?? '---' }}</x-table.column>
                <x-table.column class="whitespace-nowrap">
                    {{ $idiomas[$idioma_dictable->idioma_id] }} {{ $niveles[$idioma_dictable->idioma_nivel_id] }}
                    - {{ $modalidades[$idioma_dictable->modalidad_id] }}
                </x-table.column>
                <x-table.column class="text-right">S/. {{ $idioma_dictable->precio_mensual }}</x-table.column>
                <x-table.column>
                    {{ $idioma_dictable->duracion_meses }} meses
                </x-table.column>
                <x-table.column>
                    <x-links.secondary
                        class="{{ $idioma_dictable->cursos_count == 0 ? 'btn-state-danger' :
                                         ($idioma_dictable->cursos_count < $idioma_dictable->duracion_meses ? 'btn-state-warning' : 'btn-state-transparent') }}"
                        href="{{ route('curso.cursos', $idioma_dictable->id) }}">
                        {{ $idioma_dictable->cursos_count }} cursos
                    </x-links.secondary>
                </x-table.column>
                <x-table.column>
                    <x-jet-secondary-button wire:click="editarDictable({{ $idioma_dictable }})"
                                            class="btn-state-transparent">
                        Editar
                    </x-jet-secondary-button>
                </x-table.column>
            </x-table.row>
        @endforeach
    </x-table.table>

    <livewire:curso.agregar-idioma-dictable :niveles="$niveles"
                                            :idiomas="$idiomas"
                                            :modalidades="$modalidades"/>

</div>
