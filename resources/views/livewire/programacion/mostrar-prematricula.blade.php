<div class="space-y-4">
    @if($mensual)
        <div class="flex justify-between items-center">
            <div class="btn-state-default px-2.5 py-0.5 rounded text-sm">Año: {{$anio_actual}}        </div>
        </div>
        @if($prematricula)
            <x-table.table>
                @slot('head')
                    <x-table.head>Inicio</x-table.head>
                    <x-table.head>Fin</x-table.head>
                @endslot
                <x-table.row>
                    <x-table.column>
                        {{$prematricula->fecha_inicio->format('d')}}
                        de {{$meses[intval($prematricula->fecha_inicio->format('m'))]}}
                    </x-table.column>
                    <x-table.column>
                        {{$prematricula->fecha_fin->format('d')}}
                        de {{$meses[intval($prematricula->fecha_fin->format('m'))]}}
                    </x-table.column>
                </x-table.row>
            </x-table.table>
        @else
            <div class="space-y-4 px-4">
                <p class="text-gray-600">Auno no programa ninguna fecha</p>
                <div class="flex gap-x-6">
                    <div class="w-full">
                        <x-jet-label for="fecha_inicio" value="Inicio de clases"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_inicio" autocomplete="off"/>
                        <x-jet-input-error for="fecha_inicio"/>
                    </div>
                    <div class="w-full">
                        <x-jet-label for="fecha_fin" value="Fin de clases"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_fin" autocomplete="off"/>
                        <x-jet-input-error for="fecha_fin"/>
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-jet-button wire:click="crear" wire:target="crear"
                                  wire:loading.class="cursor-wait" wire:loading.attr="disabled">
                        {{ __('Crear') }}
                    </x-jet-button>
                </div>
            </div>
        @endif
    @else
        Sin fecha
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
