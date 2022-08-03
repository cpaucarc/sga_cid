<div class="space-y-6">

    <x-titulo
        titulo="Idioma: {{ $idioma_nombre }} {{ $niveles[$dictable->idioma_nivel_id] }} - {{ $modalidad->nombre }}">
        @slot('subtitulo')
            <div class="rounded-md text-sm text-slate-700 flex flex-wrap gap-6 mt-2 relative">
                @if(!is_null($requisito))
                    <a href="{{ route('curso.cursos', $requisito->id) }}"
                       class="text-blue-600 hover:text-blue-700 hover:underline soft-transition">
                        <b>Pre-requisito:</b> {{ $idioma_nombre . ' ' .  $niveles[$requisito->idioma_nivel_id] . ' - ' . $modalidad->nombre }}
                    </a>
                @else
                    <p><b>Pre-requisito:</b> Ninguno</p>
                @endif

                <p><b>Duracion:</b> {{ $modalidad->duracion_meses }} meses</p>

                <p><b>Precio mensual:</b> S/. {{ $dictable->precio_mensual }}</p>
            </div>
        @endslot
    </x-titulo>

    @if(count($cursos) != $modalidad->duracion_meses)
        <div class="space-y-2">
            <x-alerta>
                Este idioma esta declarado con una duración de
                <span class="font-bold whitespace-nowrap">{{ $modalidad->duracion_meses  }} meses</span>,
                por lo que deberia de contar con <span class="font-bold whitespace-nowrap">{{ $modalidad->duracion_meses }} meses</span>,
                sin embargo, actualmente tiene <span class="font-bold whitespace-nowrap">{{ count($cursos) }} cursos registrados.</span>
            </x-alerta>

            <div class="flex flex-col md:flex-row items-center justify-center gap-x-4">
                @if(count($cursos) == 0)
                    <x-jet-secondary-button onclick="crearAutomaticamente()" class="btn-state-danger">
                        Generar cursos (automatico)
                    </x-jet-secondary-button>
                @endif

                <x-jet-secondary-button wire:click="agregarCurso" class="btn-state-default">
                    Agregar curso (manual)
                </x-jet-secondary-button>
            </div>
            <br>
        </div>
    @endif

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
                    <b>{{ $idioma_nombre }}</b> - {{ $niveles[$dictable->idioma_nivel_id] }}
                    - {{ $modalidad->nombre }}
                </x-table.column>
                <x-table.column class="text-center"><b>{{ $ciclos[$curso->ciclo_id] }}</b></x-table.column>
                <x-table.column>{{ $curso->aforo_maximo }} estudiantes</x-table.column>
                <x-table.column>
                    <x-jet-secondary-button wire:click="editarCurso({{ $curso }})" class="btn-state-transparent">
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
