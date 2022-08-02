<div class="space-y-4">

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
            <x-table.head>Idioma</x-table.head>
            <x-table.head>Nivel</x-table.head>
            <x-table.head>Modalidad</x-table.head>
            <x-table.head class="text-right">Precio Mensual</x-table.head>
            <x-table.head>Duración</x-table.head>
            <x-table.head class="text-center">Cursos</x-table.head>
            <x-table.head>Action</x-table.head>
        @endslot

        @foreach($idiomas_dictables as $idioma_dictable)
            <x-table.row>
                <x-table.column class="uppercase">{{ $idioma_dictable->codigo }}</x-table.column>
                <x-table.column class="uppercase">{{ $idioma_dictable->requisito ?? '---' }}</x-table.column>
                <x-table.column>{{ $idioma_dictable->idioma_id }}
                    - {{ $idiomas[$idioma_dictable->idioma_id] }}</x-table.column>
                <x-table.column>{{ $niveles[$idioma_dictable->idioma_nivel_id] }}</x-table.column>
                <x-table.column>{{ $modalidades[$idioma_dictable->modalidad_id] }}</x-table.column>
                <x-table.column class="text-right">S/. {{ $idioma_dictable->precio_mensual }}</x-table.column>
                <x-table.column>{{ $idioma_dictable->duracion_meses }} meses</x-table.column>
                <x-table.column>
                    <x-links.secondary
                        class="{{ $idioma_dictable->cursos_count == 0 ? 'btn-state-danger' :
                                 ($idioma_dictable->cursos_count < $idioma_dictable->duracion_meses ? 'btn-state-warning' : 'btn-state-transparent') }}"
                        href="{{ route('curso.cursos', $idioma_dictable->id) }}">
                        {{ $idioma_dictable->cursos_count }} cursos
                    </x-links.secondary>
                </x-table.column>
                <x-table.column>
                    <x-links.secondary href="#"
                                       class="btn-state-transparent">
                        Editar
                    </x-links.secondary>
                </x-table.column>
            </x-table.row>
        @endforeach

    </x-table.table>


</div>
