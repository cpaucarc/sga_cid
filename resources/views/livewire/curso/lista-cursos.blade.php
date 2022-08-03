<div class="space-y-6">

    <x-titulo
        titulo="Idioma: {{ $idiomas[$dictable->idioma_id] }} {{ $niveles[$dictable->idioma_nivel_id] }} - {{ $modalidades[$dictable->modalidad_id] }}">
        @slot('subtitulo')
            <div class="rounded-md text-sm text-slate-700 flex flex-wrap gap-6 mt-2 relative">
                @if(!is_null($requisito))
                    <a href="{{ route('curso.cursos', $requisito->id) }}"
                       class="text-blue-600 hover:text-blue-700 hover:underline soft-transition">
                        <b>Pre-requisito:</b> {{ $idiomas[$requisito->idioma_id] . ' ' .  $niveles[$requisito->idioma_nivel_id] . ' - ' . $modalidades[$requisito->modalidad_id] }}
                    </a>
                @else
                    <p><b>Pre-requisito:</b> Ninguno</p>
                @endif

                <p><b>Duracion:</b> {{ $dictable->duracion_meses }} meses</p>

                <p><b>Precio mensual:</b> S/. {{ $dictable->precio_mensual }}</p>
            </div>
        @endslot
    </x-titulo>


    <div class="space-y-2">
        <x-alerta>
            Este idioma esta declarado con una duración de <b>{{ $dictable->duracion_meses }} meses</b>, por lo que
            deberia de contar con <b>{{ $dictable->duracion_meses }} cursos</b>, sin
            embargo, actualmente tiene <b>{{ count($cursos) }} cursos registrados.</b>
        </x-alerta>

        <div class="flex justify-center gap-x-4">
            <x-jet-secondary-button class="btn-state-danger">
                Agregar cursos automaticamente
            </x-jet-secondary-button>

            <x-jet-secondary-button class="btn-state-default">
                Agregar curso manualmente
            </x-jet-secondary-button>
        </div>
        <br>
    </div>


    <x-table.table>
        @slot('head')
            <x-table.head>Código</x-table.head>
            <x-table.head>Pre-requisito</x-table.head>
            <x-table.head>Idioma</x-table.head>
            <x-table.head class="text-center">Ciclo</x-table.head>
            <x-table.head>Max. por grupo</x-table.head>
            <x-table.head><span class="sr-only">Acciones</span></x-table.head>
        @endslot

        @foreach($cursos as $curso)
            <x-table.row>
                <x-table.column class="uppercase">{{ $curso->codigo }}</x-table.column>
                <x-table.column class="uppercase">{{ $curso->requisito ?? '---' }}</x-table.column>
                <x-table.column>
                    <b>{{ $idiomas[$dictable->idioma_id] }}</b> - {{ $niveles[$dictable->idioma_nivel_id] }}
                </x-table.column>
                <x-table.column class="text-center"><b>{{ $ciclos[$curso->ciclo_id] }}</b></x-table.column>
                <x-table.column>{{ $curso->aforo_maximo }} estudiantes</x-table.column>
                <x-table.column>
                    <x-links.secondary href="#" class="btn-state-transparent">
                        Editar
                    </x-links.secondary>
                </x-table.column>
            </x-table.row>
        @endforeach

    </x-table.table>

</div>
