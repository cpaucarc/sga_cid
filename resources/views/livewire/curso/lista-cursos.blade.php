<div class="space-y-6">

    <x-titulo
        titulo="Idioma: {{ $idioma_nombre }} {{ $niveles[$dictable->idioma_nivel_id] }} - {{ $modalidad->nombre }}">
        @slot('subtitulo')
            <div class="text-sm text-gray-3 flex flex-wrap gap-6 mt-2 items-center relative">
                @if(!is_null($requisito))
                    <x-links.secondary href="{{ route('curso.cursos', $requisito->id) }}">
                        <b>Pre-requisito:</b> {{ $idioma_nombre . ' ' .  $niveles[$requisito->idioma_nivel_id] . ' - ' . $modalidad->nombre }}
                        ({{ $requisito_cursos }} cursos)
                    </x-links.secondary>
                @else
                    <p><b>Pre-requisito:</b> Ninguno</p>
                @endif

                <p><b>Duracion:</b> {{ $dictable->duracion_meses }} meses</p>

                <p><b>Precio mensual:</b> S/. {{ $dictable->precio_mensual }}</p>
            </div>
        @endslot
    </x-titulo>

    @if(count($cursos) != $dictable->duracion_meses)
        <div class="space-y-2">
            <x-alerta>
                Este idioma esta declarado con una duración de
                <span class="font-bold whitespace-nowrap">{{ $dictable->duracion_meses  }} meses</span>,
                por lo que deberia de contar con <span class="font-bold whitespace-nowrap">{{ $dictable->duracion_meses }} cursos</span>,
                sin embargo, actualmente tiene <span class="font-bold whitespace-nowrap">{{ count($cursos) }} cursos registrados.</span>
            </x-alerta>

            <div class="flex flex-col md:flex-row items-center justify-center gap-x-4">
                @if(count($cursos) == 0)
                    <x-jet-button onclick="crearAutomaticamente()">
                        Generar cursos (automatico)
                    </x-jet-button>
                @endif

                <x-jet-button wire:click="agregarCurso">
                    Agregar curso (manual)
                </x-jet-button>
            </div>
            <br>
        </div>
    @endif

    <x-table.table>
        @slot('head')
            <x-table.head>Código</x-table.head>
            <x-table.head>Idioma</x-table.head>
            <x-table.head>Aforo Mínimo</x-table.head>
            <x-table.head>Recomendado</x-table.head>
            <x-table.head>Máximo</x-table.head>
            <x-table.head><span class="sr-only">Acciones</span></x-table.head>
        @endslot

        @foreach($cursos as $curso)
            <x-table.row>
                <x-table.column class="uppercase">{{ $curso->codigo }}</x-table.column>
                <x-table.column>
                    <b>{{ $idioma_nombre }} {{ $niveles[$dictable->idioma_nivel_id] }} {{ $ciclos[$curso->ciclo_id] }}</b>
                    - ({{ $modalidad->nombre }})
                </x-table.column>
                <x-table.column>{{ $curso->aforo_minimo }} estudiantes</x-table.column>
                <x-table.column>{{ $curso->aforo_recomendado }} estudiantes</x-table.column>
                <x-table.column>{{ $curso->aforo_maximo }} estudiantes</x-table.column>
                <x-table.column>
                    <x-jet-secondary-button wire:click="editarCurso({{ $curso }})">
                        <x-icons.edit class="icon-5"/>
                        Editar
                    </x-jet-secondary-button>
                </x-table.column>
            </x-table.row>
        @endforeach

    </x-table.table>

    <livewire:curso.agregar-curso idioma_dictable_id="{{ $this->dictable->id }}"
                                  idioma="{{ $idioma_nombre }}"
                                  modalidad="{{ $modalidad->nombre }}"
                                  nivel="{{ $niveles[$dictable->idioma_nivel_id] }}"/>

    @push('js')
        <script>
            Livewire.on('guardado', msg => {
                sweetToast(msg, 'success');
            });

            Livewire.on('error', msg => {
                errorAlert(msg);
            });

            async function crearAutomaticamente() {
                const rsta = await Swal.fire({
                    icon: 'question',
                    text: '¿Quiere que se generen automaticamente los cursos?',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Si, generar',
                    confirmButtonColor: '#3b82f6',
                    cancelButtonColor: '#94a3b8',
                })

                console.log(rsta)

                if (rsta.isConfirmed) {
                    window.livewire.emit('generarCursosAutomaticamente');
                }
            }
        </script>
    @endpush

</div>
