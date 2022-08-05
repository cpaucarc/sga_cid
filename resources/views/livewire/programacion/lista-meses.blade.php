<div class="space-y-4">
    <div class="flex justify-between items-center">
        <div class="btn-state-transparent px-2.5 py-0.5 rounded text-sm">
            Año: {{$anio_actual}} ({{$mensuales->count()}})
        </div>
        <x-links.primary href="{{ route('programacion.mensual.crear') }}">{{ __('Crear') }}</x-links.primary>
    </div>
    @if(count($mensuales)>0)
        <x-table.table>
            @slot('head')
                <x-table.head>Mes</x-table.head>
                <x-table.head>Estado</x-table.head>
                <x-table.head><span class="sr-only">Action</span></x-table.head>
            @endslot
            @foreach($mensuales as $ms)
                <x-table.row>
                    <x-table.column class="font-semibold">
                        {{$meses[$ms->mes_id]}}
                    </x-table.column>
                    <x-table.column>
                        @if($ms->esta_activo)
                            <button type="button" class="btn btn-state-success">{{ __('Activo') }}</button>
                        @else
                            <button type="button" wire:click="activar({{$ms->id}})"
                                    class="btn btn-state-default">{{ __('Activar') }}</button>
                        @endif
                    </x-table.column>
                    <x-table.column>
                        <button class="btn btn-state-transparent" wire:click="mostrarInfo('{{ $ms->id }}')">
                            <svg class="icon-5" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                      d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </button>
                    </x-table.column>
                </x-table.row>
            @endforeach
        </x-table.table>
    @else
        <x-message-image>
            <x-slot:title>Aún no agrega ningún mes</x-slot:title>
            <x-slot:description>
                Aquí se mostrará todos los meses programados para cada año.
            </x-slot:description>
            {{--<x-slot:image>{{ asset('images/logo_cid.svg')  }}</x-slot:image>--}}
        </x-message-image>
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
                            {{$datos_mes->clase_modalidad_id===1 ? 'Precencial' : 'Virtual'}}
                        </x-table.column>
                    </x-table.row>
                </x-table.table>
            </x-slot:content>
            <x-slot:footer></x-slot:footer>
        </x-jet-dialog-modal>
    @endif
</div>
