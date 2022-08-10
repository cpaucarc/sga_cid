<div class="space-y-6">
    @if($mensual)
        <div class="px-8 pb-6">
            <div class="flex justify-center">
                @if( now() < $mensual->inicio_prematricula)
                    <p class="badge-dark text-sm">La etapa de prematrícula iniciará
                        {{ $mensual->inicio_prematricula->diffForHumans() }}</p>
                @else
                    @if( now() > $mensual->fin_prematricula)
                        <p class="badge-danger text-sm">La etapa de prematrícula terminó
                            {{ $mensual->fin_prematricula->diffForHumans() }}</p>
                    @else
                        @if( now() == $mensual->fin_prematricula)
                            <p class="badge-warning text-sm">La etapa de prematrícula termina el dia de hoy</p>
                        @else
                            <p class="badge-success text-sm">La etapa de prematrícula esta activa, terminará
                                en {{ now()->diffInDays($mensual->fin_prematricula) }} dias</p>
                        @endif
                    @endif
                @endif
            </div>
            <div class="flex items-center justify-between text-sm text-gray-4">
                <span class="flex-shrink-0 ml-1 mr-3">
                    {{ $mensual->inicio_prematricula->format('d, M Y') }}
                </span>
                <div class="w-2 h-2 rounded-full bg-gray-2"></div>
                <hr class="border-gray-2 border-dashed flex-1">
                <div class="w-2 h-2 rounded-full bg-gray-2"></div>
                <span class="flex-shrink-0 mr-1 ml-3">
                    {{ $mensual->fin_prematricula->format('d, M Y') }}
                </span>
            </div>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex space-x-2 items-center">
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
            <div>
                <x-forms.toggle textoIzq="Todos" textoDer="Aperturables"
                                wire:model="ver_solo_aperturables"/>
            </div>
        </div>
        {{--                <x-dd>--}}
        {{--                    {{$cursos}}--}}
        {{--                </x-dd>--}}
        <x-table.table>
            @slot('head')
                <x-table.head>N°</x-table.head>
                <x-table.head>Idioma</x-table.head>
                <x-table.head>Prematriculados</x-table.head>
                <x-table.head>Recomendado</x-table.head>
                <x-table.head>Aperturado</x-table.head>
                <x-table.head><span class="sr-only">Acciones</span></x-table.head>
            @endslot

            @foreach($cursos as $i => $curso)
                @php
                    $grupos = \App\Lib\MatriculaUtil::calcularGrupos($curso->prematriculados, $curso->aforo_minimo, $curso->aforo_recomendado, $curso->aforo_maximo);
                    $curso_nombre = $idiomas[$curso->dictable->idioma_id] . ' ' . $niveles[$curso->dictable->idioma_nivel_id];
                    $curso_ciclo = $ciclos[$curso->ciclo_id];
                    $curso_mod = $modalidades[$curso->dictable->modalidad_id];
                @endphp

                @if($ver_solo_aperturables)
                    @if($grupos > 0)
                        <x-table.row>
                            <x-table.column>{{ $i + 1 }}</x-table.column>
                            <x-table.column class="whitespace-nowrap">
                                <span class="font-semibold">{{ $curso_nombre }}</span>
                                <span class="font-black mr-1">{{ $curso_ciclo }}</span>
                                ({{ $curso_mod }})
                            </x-table.column>
                            <x-table.column class="whitespace-nowrap">
                                <button wire:click="verEstudiantes({{ $curso }})"
                                        class="{{ $curso->prematriculados == 0 ? 'text-rose-3' : '' }}">
                                    <span class="font-semibold">{{ $curso->prematriculados }} estudiantes</span>
                                    @if($grupos > 0 && $curso->sin_matricular > 0)
                                        ({{ $curso->sin_matricular }} sin matricula)
                                    @endif
                                </button>
                            </x-table.column>
                            <x-table.column
                                class="whitespace-nowrap {{ $grupos == 0 ? 'text-rose-3' : 'font-semibold' }}">
                                {{ $grupos }} grupo(s)
                            </x-table.column>
                            <x-table.column
                                class="whitespace-nowrap {{ $curso->grupos_aperturados == 0 ? 'text-rose-3' : '' }}">
                                {{ $curso->grupos_aperturados }} grupo(s)
                            </x-table.column>
                            <x-table.column class="flex justify-end">
                                @if($grupos === 0)
                                    <p class="badge-danger"
                                       title="Este curso no tiene suficientes estudiantes incritos">
                                        No aperturable
                                    </p>
                                @else
                                    <x-jet-secondary-button class="badge-primary"
                                                            onclick="crearGrupos('{{ $curso_nombre .' '. $curso_ciclo .' ('. $curso_mod .')'}}', {{$curso->id}}, {{ $grupos }}, {{ $curso->grupos_aperturados }}, {{ $curso->dictable->idioma_id }})">
                                        Crear grupo
                                    </x-jet-secondary-button>
                                @endif
                            </x-table.column>
                        </x-table.row>
                    @endif
                @else
                    <x-table.row>
                        <x-table.column>{{ $i + 1 }}</x-table.column>
                        <x-table.column class="whitespace-nowrap">
                            <span class="font-semibold">{{ $curso_nombre }}</span>
                            <span class="font-black mr-1">{{ $curso_ciclo }}</span>
                            ({{ $curso_mod }})
                        </x-table.column>
                        <x-table.column class="whitespace-nowrap">
                            <button wire:click="verEstudiantes({{ $curso }})"
                                    class="{{ $curso->prematriculados == 0 ? 'text-rose-3' : '' }}">
                                <span class="font-semibold">{{ $curso->prematriculados }} estudiantes</span>
                                @if($grupos > 0 && $curso->sin_matricular > 0)
                                    ({{ $curso->sin_matricular }} sin matricula)
                                @endif
                            </button>
                        </x-table.column>
                        <x-table.column
                            class="whitespace-nowrap {{ $grupos == 0 ? 'text-rose-3' : 'font-semibold' }}">
                            {{ $grupos }} grupo(s)
                        </x-table.column>
                        <x-table.column
                            class="whitespace-nowrap {{ $curso->grupos_aperturados == 0 ? 'text-rose-3' : '' }}">
                            {{ $curso->grupos_aperturados }} grupo(s)
                        </x-table.column>
                        <x-table.column class="flex justify-end">
                            @if($grupos === 0)
                                <p class="badge-danger"
                                   title="Este curso no tiene suficientes estudiantes incritos">
                                    No aperturable
                                </p>
                            @else
                                <x-jet-secondary-button class="badge-primary"
                                                        onclick="crearGrupos('{{ $curso_nombre .' '. $curso_ciclo .' ('. $curso_mod .')'}}', {{$curso->id}}, {{ $grupos }}, {{ $curso->grupos_aperturados }}, {{ $curso->dictable->idioma_id }})">
                                    Crear grupo
                                </x-jet-secondary-button>
                            @endif
                        </x-table.column>
                    </x-table.row>
                @endif
            @endforeach
        </x-table.table>

        {{-- Creacion  de grupos --}}
        <livewire:matricula.crear-grupo/>

        {{-- Lista de Prematriculados por curso --}}
        @if($curso_seleccionado)
            <x-jet-dialog-modal wire:model="open_modal_lista_prematriculados" maxWidth="4xl">
                <x-slot name="title">
                    <h1 class="font-bold text-gray-4">Lista de Pre-matriculados</h1>
                </x-slot>

                <x-slot name="content">
                    <div class="space-y-4">
                        <div class="space-y-2">
                            <h2 class="text-gray-4 font-bold">
                                Estudiantes inscritos: <span class="font-black">{{ count($estudiantes) }}</span>
                            </h2>

                            <x-table.table>
                                @slot('head')
                                    <x-table.head>N°</x-table.head>
                                    <x-table.head>Nombre</x-table.head>
                                    <x-table.head>Tipo</x-table.head>
                                    <x-table.head>Estado</x-table.head>
                                    <x-table.head>Inscripción</x-table.head>
                                @endslot

                                @foreach($estudiantes as $j => $estudiante)
                                    <x-table.row>
                                        <x-table.column>{{ $j + 1 }}</x-table.column>
                                        <x-table.column>
                                            {{ $estudiante->persona->apellido_paterno }} {{ $estudiante->persona->apellido_materno }} {{ $estudiante->persona->nombres }}
                                        </x-table.column>
                                        <x-table.column>
                                            {{ $tipos[$estudiante->tipo_estudiante_id] }}
                                        </x-table.column>
                                        <x-table.column>
                                            <p class="{{ $estudiante->esta_matriculado ? 'badge-success' : 'badge-danger' }}">
                                                {{ $estudiante->esta_matriculado ? 'Matriculado' : 'Sin matricula' }}
                                            </p>
                                        </x-table.column>
                                        <x-table.column>
                                            {{ \Carbon\Carbon::parse($estudiante->fecha_inscripcion)->format('h:m a  d-m-Y') }}
                                        </x-table.column>
                                    </x-table.row>
                                @endforeach
                            </x-table.table>
                        </div>

                        <div class="space-y-2">
                            <h2 class="text-gray-4 font-bold">Datos de aforo del curso</h2>
                            <ul class="list-disc list-inside pl-4 text-gray-4 text-sm space-y-1">
                                <li>
                                    El número minimo de estudiantes para aperturar un grupo en este curso es de
                                    <b>{{ $curso_seleccionado->aforo_minimo }}</b>.
                                </li>
                                <li>
                                    Se recomienda que cada grupo de este curso, esté conformado por
                                    <b>{{ $curso_seleccionado->aforo_recomendado }}</b> estudiantes inscritos.
                                </li>
                                <li>
                                    Un grupo de este curso debe estar conformado como máximo de
                                    <b>{{ $curso_seleccionado->aforo_maximo }}</b> estudiantes inscritos.
                                </li>
                            </ul>
                        </div>
                    </div>
                </x-slot>
            </x-jet-dialog-modal>
        @endif

    @else
        No hay ninguna información
    @endif

    @push('js')
        <script>
            Livewire.on('creado', msg => {
                console.log('Creado', msg)
                sweetToast(msg, 'success');
            });

            function crearGrupos(curso, curso_id, grupos, aperturados, idioma_id) {
                if (aperturados >= grupos) {
                    Swal.fire({
                        icon: 'question',
                        html: `El curso ${curso} ya tiene ${aperturados} grupo(s) aperturados. ¿Desea aperturar más grupos?`,
                        showCancelButton: true,
                        cancelButtonText: 'Cancelar',
                        confirmButtonText: `Si, continuar`,
                        confirmButtonColor: '#3b82f6'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.livewire.emit('crearGrupo', curso, curso_id, idioma_id);
                        }
                    })
                } else {
                    window.livewire.emit('crearGrupo', curso, curso_id, idioma_id);
                }

            }

            function crearNGrupos(curso, curso_id, recomendado, maximo, grupos) {
                Swal.fire({
                    icon: 'question',
                    html: `¿Cuantos grupos desea aperturar para el curso <b>${curso}</b>? <br><br> <b>Recomendado:</b> ${grupos} grupo(s)`,
                    input: 'number',
                    inputAttributes: {
                        value: grupos,
                        min: 0,
                        step: 1,
                        placeholder: 'Ingrese la cantidad de grupos a crear...'
                    },
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonText: 'Crear grupos',
                    confirmButtonColor: '#3b82f6',
                    preConfirm: (cantidad) => {
                        if (cantidad.length === 0 || parseInt(cantidad) <= 0) {
                            Swal.showValidationMessage(`Debe ingresar un valor mayor o igual a 1`)
                        }
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.livewire.emit('crearGrupos', curso_id, recomendado, maximo, parseInt(result.value));
                    }
                })
            }
        </script>
    @endpush
</div>
