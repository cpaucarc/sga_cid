<div class="space-y-4">
    @if($mensual)
        <div class="px-8 pb-6">
            <div class="flex justify-center">
                @if( now() < $mensual->inicio_prematricula)
                    <p class="badge-dark">La etapa de prematrícula iniciará
                        {{ $mensual->inicio_prematricula->diffForHumans() }}</p>
                @else
                    @if( now() > $mensual->fin_prematricula)
                        <p class="badge-danger">La etapa de prematrícula terminó
                            {{ $mensual->fin_prematricula->diffForHumans() }}</p>
                    @else
                        @if( now() == $mensual->fin_prematricula)
                            <p class="badge-warning">La etapa de prematrícula termina el dia de hoy</p>
                        @else
                            <p class="badge-success">La etapa de prematrícula esta activa, terminará
                                en {{ now()->diffInDays($mensual->fin_prematricula) }} dias</p>
                        @endif
                    @endif
                @endif
            </div>
            <div class="flex items-center justify-between text-sm">
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

        {{--        <x-dd>--}}
        {{--            {{ $cursos }}--}}
        {{--        </x-dd>--}}

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
                <x-table.head class="text-right" hide>Precio Mensual</x-table.head>
                <x-table.head hide>Max. por grupo</x-table.head>
                <x-table.head>Prematriculados</x-table.head>
                <x-table.head><span class="sr-only">Acciones</span></x-table.head>
            @endslot

            @foreach($cursos as $i => $curso)
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
                    <x-table.column class="text-right" hide>
                        S/. {{ $curso->dictable->precio_mensual }}
                    </x-table.column>
                    <x-table.column hide>
                        {{ $curso->aforo_maximo }} estudiantes por grupo
                    </x-table.column>
                    <x-table.column><b>{{ $curso->prematriculados }} estudiantes</b></x-table.column>
                    <x-table.column>
                        {{--                        <x-links.secondary href="#" class="btn-state-transparent">--}}
                        {{--                            Ver más--}}
                        {{--                        </x-links.secondary>--}}

                        <x-jet-dropdown align="right" width="60">
                            <x-slot name="trigger">
                                <button class="px-2 text-slate-500 hover:text-slate-800 soft-transition">
                                    <x-icons.dots-vertical class="icon-5"/>
                                </button>
                            </x-slot>

                            <x-slot name="content">
                                <div class="w-40">
                                    <!-- Team Settings -->
                                    <x-buttons.dropdown-button>
                                        Generar&nbsp;<b>N</b>&nbsp;grupos
                                    </x-buttons.dropdown-button>
                                    <x-buttons.dropdown-button>
                                        Generar&nbsp;<b>2</b>&nbsp;grupos
                                    </x-buttons.dropdown-button>
                                    <div class="border-t border-gray-100"></div>
                                    <x-jet-dropdown-link href="#">
                                        Ver más datos
                                    </x-jet-dropdown-link>
                                </div>
                            </x-slot>
                        </x-jet-dropdown>
                    </x-table.column>
                </x-table.row>
            @endforeach

        </x-table.table>
    @else
        No hay ninguna información
    @endif
</div>
