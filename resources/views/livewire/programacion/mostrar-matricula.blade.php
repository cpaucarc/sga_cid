<div class="space-y-4">
    @if($mensual)
        <div class="flex justify-between items-center">
            <div class="btn-state-transparent px-2.5 py-0.5 rounded text-sm">
                Año: {{$anio_actual}}
            </div>
        </div>
        @if($matricula)
            <x-alerta>
                La matrícula comienza el
                <span class="font-bold whitespace-nowrap">
                    {{$matricula->fecha_inicio->format('d')}}
                        de {{$meses[intval($matricula->fecha_inicio->format('m'))]}}
                </span> y finaliza el
                <span class="font-bold whitespace-nowrap">
                   {{$matricula->fecha_fin->format('d')}}
                        de {{$meses[intval($matricula->fecha_fin->format('m'))]}}
                </span>.
            </x-alerta>
        @else
            <div class="space-y-4">
                <x-alerta>
                    En este mes de <span
                        class="font-bold whitespace-nowrap">{{$meses[intval($mensual->fecha_inicio_clases->format('m'))]}}</span>,
                    aún no programa fechas de <span class="font-bold whitespace-nowrap">matrícula</span>.
                </x-alerta>
                <div class="flex gap-x-6">
                    <div class="w-full">
                        <x-jet-label for="fecha_inicio" value="Inicio de matrícula"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_inicio" autocomplete="off"/>
                        <x-jet-input-error for="fecha_inicio"/>
                    </div>
                    <div class="w-full">
                        <x-jet-label for="fecha_fin" value="Fin de matrícula"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_fin" autocomplete="off"/>
                        <x-jet-input-error for="fecha_fin"/>
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-jet-button wire:click="crearMatricula" wire:target="crearMatricula"
                                  wire:loading.class="cursor-wait" wire:loading.attr="disabled">
                        {{ __('Crear') }}
                    </x-jet-button>
                </div>
            </div>
        @endif
    @else
        <x-message-image>
            <x-slot:title>Aún no agrega ningún mes</x-slot:title>
            <x-slot:description>
                Aquí se mostrará las fechas programadas para la matrícula.
            </x-slot:description>
            {{--<x-slot:image>{{ asset('images/logo_cid.svg')  }}</x-slot:image>--}}
        </x-message-image>
    @endif

    @push('js')
        <script>
            Livewire.on('guardado', msg => {
                console.log('Guardado', msg)
                sweetToast(msg, 'success');
            });
            Livewire.on('error', msg => {
                console.log('Error', msg)
                sweetToast(msg, 'error');
            });
        </script>
    @endpush
</div>
