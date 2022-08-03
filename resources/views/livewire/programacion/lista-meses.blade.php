<div class="space-y-4">
    <div class="flex justify-between items-center">
        <div class="btn-state-default px-2.5 py-0.5 rounded text-sm">Año: {{$anio_actual}} ({{$mensuales->count()}})
        </div>
        <x-links.primary href="{{ route('programacion.mensual.crear') }}">{{ __('Crear') }}</x-links.primary>
    </div>
    <x-table.table>
        @slot('head')
            <x-table.head>Mes</x-table.head>
            <x-table.head>Estado</x-table.head>
            <x-table.head><span class="sr-only">Action</span></x-table.head>
        @endslot
        @foreach($mensuales as $ms)
            <x-table.row>
                <x-table.column class="uppercase">
                    {{$meses[$ms->mes_id]}}
                </x-table.column>
                <x-table.column>
                    @if($ms->esta_activo)
                        <button type="button" class="btn btn-state-default">{{ __('Activo') }}</button>
                    @else
                        <button type="button" wire:click="activar({{$ms->id}})"
                                class="btn          btn-state-transparent">{{ __('Activar') }}</button>
                    @endif
                </x-table.column>
                <x-table.column>
                    <button class="btn btn-state-transparent" wire:click="mostrarInfo('{{ $ms->id }}')">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-5" fill="none" viewBox="0 0 24 24"
                             stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                  d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </button>
                </x-table.column>
            </x-table.row>
        @endforeach
    </x-table.table>

    {{-- Modal de datos del mes seleccionado --}}
    @if($datos_mes)
        <x-jet-dialog-modal wire:model="open" maxWidth="xl">
            <x-slot name="title">
                <div class="w-full flex justify-between">
                    <h1 class="font-bold text-zinc-700">
                        Datos del mes
                    </h1>
                    <button class="btn hover:btn-state-danger" wire:click="$set('open', false)">x</button>
                </div>
            </x-slot>

            <x-slot name="content">
                <x-table.table>
                    <x-table.row>
                        <x-table.column class="font-bold ">
                            Año
                        </x-table.column>
                        <x-table.column class="font-light">
                            {{$datos_mes->anio}}
                        </x-table.column>
                    </x-table.row>
                    <x-table.row>
                        <x-table.column class="font-bold ">
                            Inicio de clases
                        </x-table.column>
                        <x-table.column class="font-light">
                            {{$datos_mes->fecha_inicio_clases->format('d')}} de {{$meses[$datos_mes->mes_id]}}
                        </x-table.column>
                    </x-table.row>
                    <x-table.row>
                        <x-table.column class="font-bold ">
                            Fin de clases
                        </x-table.column>
                        <x-table.column class="font-light">
                            {{$datos_mes->fecha_fin_clases->format('d')}} de {{$meses[($datos_mes->mes_id+1)]}}
                        </x-table.column>
                    </x-table.row>
                    <x-table.row>
                        <x-table.column class="font-bold ">
                            Modalidad
                        </x-table.column>
                        <x-table.column class="font-light">
                            {{$datos_mes->clase_modalidad_id===1 ? 'Precencial' : 'Virtual'}}
                        </x-table.column>
                    </x-table.row>
                </x-table.table>
            </x-slot>
            <x-slot name="footer">

            </x-slot>
        </x-jet-dialog-modal>
    @endif

    @push('js')
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            Livewire.on('guardado', rspta => {
                Swal.fire({
                    html: `<b>!${rspta.titulo}!</b><br/><small>${rspta.mensaje}</small>`,
                    icon: 'success'
                });
            });

            Livewire.on('error', msg => {
                Swal.fire({
                    html: `<b>!Hubo un error!</b><br/><small>${msg}</small>`,
                    icon: 'error'
                });
            });
        </script>
    @endpush
</div>
