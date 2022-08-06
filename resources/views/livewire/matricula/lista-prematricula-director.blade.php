<div class="space-y-4">
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
            <div class="flex items-center justify-between text-sm text-slate-800">
                <span class="flex-shrink-0 ml-1 mr-3">
                    {{ $mensual->inicio_prematricula->format('d, M Y') }}
                </span>
                <div class="w-2 h-2 rounded-full bg-slate-400"></div>
                <hr class="border border-slate-400 border-dashed flex-1">
                <div class="w-2 h-2 rounded-full bg-slate-400"></div>
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
        </div>

        <x-table.table>
            @slot('head')
                <x-table.head>N°</x-table.head>
                <x-table.head>Idioma</x-table.head>
                <x-table.head class="text-right" hide>Mensual</x-table.head>
                <x-table.head>Prematriculados</x-table.head>
                <x-table.head>Grupos</x-table.head>
                <x-table.head><span class="sr-only">Acciones</span></x-table.head>
            @endslot

            @foreach($cursos as $i => $curso)
                @php
                    $grupos = \App\Lib\MatriculaUtil::calcularGrupos($curso->prematriculados, $curso->aforo_minimo, $curso->aforo_recomendado, $curso->aforo_maximo);
                @endphp

                <x-table.row>
                    <x-table.column>{{ $i + 1 }}</x-table.column>
                    <x-table.column class="whitespace-nowrap">
                        <p>
                            <span class="font-semibold">
                                {{ $idiomas[$curso->dictable->idioma_id] }} {{ $niveles[$curso->dictable->idioma_nivel_id] }}
                            </span>
                            <span class="font-black mr-1">{{ $ciclos[$curso->ciclo_id] }}</span>
                            ({{ $modalidades[$curso->dictable->modalidad_id] }})
                        </p>
                    </x-table.column>
                    <x-table.column class="text-right whitespace-nowrap" hide>
                        S/. {{ $curso->dictable->precio_mensual }}
                    </x-table.column>
                    <x-table.column class="whitespace-nowrap">
                        <button wire:click="verEstudiantes({{ $curso }})"
                                class="{{ $curso->prematriculados == 0 ? 'text-rose-600' : 'font-semibold' }}">
                            {{ $curso->prematriculados }} estudiantes
                        </button>
                    </x-table.column>
                    <x-table.column class="whitespace-nowrap">
                        <p class="{{ $grupos == 0 ? 'text-rose-600' : 'font-semibold' }}">{{ $grupos }} grupos</p>
                    </x-table.column>
                    <x-table.column class="flex justify-end">
                        @if($grupos > 0)
                            <x-jet-dropdown align="right" width="60">
                                <x-slot name="trigger">
                                    <button class="px-2 text-slate-500 hover:text-slate-800 soft-transition">
                                        <x-icons.dots-vertical class="icon-5"/>
                                    </button>
                                </x-slot>

                                <x-slot name="content">
                                    <div class="w-40">
                                        <x-buttons.dropdown-button>
                                            Generar&nbsp;<b>N</b>&nbsp;grupos
                                        </x-buttons.dropdown-button>
                                        <x-buttons.dropdown-button>
                                            Generar&nbsp;<b>{{ $grupos }}</b>&nbsp;grupos
                                        </x-buttons.dropdown-button>
                                        <div class="border-t border-gray-100"></div>
                                        <x-jet-dropdown-link href="#">
                                            Ver más datos
                                        </x-jet-dropdown-link>
                                    </div>
                                </x-slot>
                            </x-jet-dropdown>
                        @else
                            <p class="badge-danger" title="Este curso no tiene suficientes estudiantes incritos">
                                No aperturable
                            </p>
                        @endif
                    </x-table.column>
                </x-table.row>
            @endforeach
        </x-table.table>

        @if($curso_seleccionado)
            <x-jet-dialog-modal wire:model="open" maxWidth="4xl">
                <x-slot name="title">
                    <h1 class="font-bold text-slate-700">Lista de Pre-matriculados</h1>
                </x-slot>

                <x-slot name="content">

                    <div class="space-y-4">
                        <div class="space-y-2">
                            <h2 class="text-slate-700 font-bold">Datos de aforo del curso</h2>
                            <ul class="list-disc list-inside pl-4 text-slate-800 text-sm space-y-1">
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

                        <div class="space-y-2">
                            <h2 class="text-slate-700 font-bold">Estudiantes inscritos: <span
                                    class="font-black">{{ count($estudiantes) }}</span></h2>
                            <x-table.table>
                                @slot('head')
                                    <x-table.head>N°</x-table.head>
                                    <x-table.head>Código</x-table.head>
                                    <x-table.head>Nombre</x-table.head>
                                    <x-table.head>Tipo</x-table.head>
                                    <x-table.head>Inscripción</x-table.head>
                                @endslot

                                @foreach($estudiantes as $j => $estudiante)
                                    <x-table.row>
                                        <x-table.column>{{ $j + 1 }}</x-table.column>
                                        <x-table.column>
                                            {{ $estudiante->codigo }}
                                        </x-table.column>
                                        <x-table.column>
                                            {{ $estudiante->persona->apellido_paterno }} {{ $estudiante->persona->apellido_materno }} {{ $estudiante->persona->nombres }}
                                        </x-table.column>
                                        <x-table.column>
                                            {{ $tipos[$estudiante->tipo_estudiante_id] }}
                                        </x-table.column>
                                        <x-table.column>
                                            {{ $estudiante->fecha_inscripcion }}
                                        </x-table.column>
                                    </x-table.row>
                                @endforeach
                            </x-table.table>
                        </div>
                    </div>
                </x-slot>
            </x-jet-dialog-modal>
        @endif

    @else
        No hay ninguna información
    @endif
</div>
