<div class="space-y-4">

    @if(count($mensuales)>0)
        <x-table.table>
            @slot('head')
                <x-table.head>Mes</x-table.head>
                <x-table.head>Modalidad</x-table.head>
                <x-table.head>Estado</x-table.head>
                <x-table.head><span class="sr-only">Action</span></x-table.head>
            @endslot
            @foreach($mensuales as $ms)
                <x-table.row>
                    <x-table.column class="font-semibold">
                        {{$meses[$ms->mes_id]}} de {{ $anio_actual }}
                    </x-table.column>
                    <x-table.column>
                        Clase {{$clase_modalidades[$ms->clase_modalidad_id]}}
                    </x-table.column>
                    <x-table.column>
                        @if($ms->esta_activo)
                            <button type="button" class="btn btn-state-success">{{ __('Activo') }}</button>
                        @else
                            @if(now() < $ms->fin_clases)
                                <button type="button" wire:click="activar({{$ms->id}})"
                                        class="btn btn-state-default">{{ __('Activar') }}</button>
                            @else
                                <p class="btn btn-state-danger">
                                    Finalizado
                                </p>
                            @endif
                        @endif
                    </x-table.column>
                    <x-table.column>
                        <div class="inline-flex">
                            <button class="btn btn-state-transparent" title="Ver información básica"
                                    wire:click="mostrarInfo('{{ $ms->id }}')">
                                <x-icons.info class="icon-5"/>
                            </button>

                            <x-links.outline
                                href="{{ route('director.matricula.programacion', ['year' => $ms->anio, 'month' => $ms->mes_id]) }}"
                                title="Ver información detallada">
                                Ver más
                            </x-links.outline>
                        </div>
                    </x-table.column>
                </x-table.row>
            @endforeach
        </x-table.table>
    @else
        <x-empty-state title="Aún no agrega ningún mes" wImage="3" wText="5"
                       description="Aquí se mostrará todos los meses programados para cada año."
                       image="{{ asset('images/calendar.svg') }}"/>
    @endif

    {{-- Modal de datos del mes seleccionado --}}
    @if($datos_mes)
        <x-jet-dialog-modal wire:model="open" maxWidth="xl">
            <x-slot:title>
                <div class="w-full flex justify-between">
                    <h1 class="font-bold text-zinc-700">
                        Información del mes de {{$meses[$datos_mes->mes_id]}}
                    </h1>
                    <button class="btn btn-state-danger" wire:click="$set('open', false)">x</button>
                </div>
            </x-slot:title>

            <x-slot:content>
                <x-table.table>
                    <x-table.row>
                        <x-table.column class="font-semibold">
                            Año
                        </x-table.column>
                        <x-table.column class="font-light">
                            {{$datos_mes->anio}}
                        </x-table.column>
                    </x-table.row>
                    <x-table.row>
                        <x-table.column class="font-semibold ">
                            Inicio de clases
                        </x-table.column>
                        <x-table.column class="font-light">
                            {{$datos_mes->inicio_clases->format('d')}}
                            de {{$meses[intval($datos_mes->inicio_clases->format('m'))]}}
                        </x-table.column>
                    </x-table.row>
                    <x-table.row>
                        <x-table.column class="font-semibold">
                            Fin de clases
                        </x-table.column>
                        <x-table.column class="font-light">
                            {{$datos_mes->fin_clases->format('d')}}
                            de {{$meses[intval($datos_mes->fin_clases->format('m'))]}}
                        </x-table.column>
                    </x-table.row>
                    <x-table.row>
                        <x-table.column class="font-semibold">
                            Modalidad
                        </x-table.column>
                        <x-table.column class="font-light">
                            {{ $clase_modalidades[$datos_mes->clase_modalidad_id] }}
                        </x-table.column>
                    </x-table.row>
                </x-table.table>
            </x-slot:content>
        </x-jet-dialog-modal>
    @endif
</div>
