<div class="space-y-4">
    @if($mensual)
        <div class="flex justify-between items-center">
            <div class="btn-state-transparent px-2.5 py-0.5 rounded text-sm">
                Año: {{$anio_actual}}
            </div>
        </div>
        @if($pagos)
            <x-alerta>
                La fecha de pagos comienza el
                <span class="font-bold whitespace-nowrap">
                    {{$pagos->fecha_inicio_pago->format('d')}}
                        de {{$meses[intval($pagos->fecha_inicio_pago->format('m'))]}}
                </span> y finaliza el
                <span class="font-bold whitespace-nowrap">
                   {{$pagos->fecha_fin_pago->format('d')}}
                        de {{$meses[intval($pagos->fecha_fin_pago->format('m'))]}}
                </span>.
            </x-alerta>
            <x-alerta>
                La fecha de revisión comienza el
                <span class="font-bold whitespace-nowrap">
                    {{$pagos->fecha_inicio_revision->format('d')}}
                        de {{$meses[intval($pagos->fecha_inicio_revision->format('m'))]}}
                </span> y finaliza el
                <span class="font-bold whitespace-nowrap">
                   {{$pagos->fecha_fin_revision->format('d')}}
                        de {{$meses[intval($pagos->fecha_fin_revision->format('m'))]}}
                </span>.
            </x-alerta>
            <x-alerta>
                La fecha de validación comienza el
                <span class="font-bold whitespace-nowrap">
                    {{$pagos->fecha_inicio_validacion->format('d')}}
                        de {{$meses[intval($pagos->fecha_inicio_validacion->format('m'))]}}
                </span> y finaliza el
                <span class="font-bold whitespace-nowrap">
                   {{$pagos->fecha_fin_validacion->format('d')}}
                        de {{$meses[intval($pagos->fecha_fin_validacion->format('m'))]}}
                </span>.
            </x-alerta>
        @else
            <div class="space-y-4">
                <x-alerta>
                    En este mes de <span
                        class="font-bold whitespace-nowrap">{{$meses[intval($mensual->fecha_inicio_clases->format('m'))]}}</span>,
                    aún no programa fechas para los <span class="font-bold whitespace-nowrap">pagos</span>.
                </x-alerta>
                <div class="flex gap-x-6">
                    <div class="w-full">
                        <x-jet-label for="fecha_inicio_pago" value="Inicio de pago"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_inicio_pago" autocomplete="off"/>
                        <x-jet-input-error for="fecha_inicio_pago"/>
                    </div>
                    <div class="w-full">
                        <x-jet-label for="fecha_fin_pago" value="Fin de pago"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_fin_pago" autocomplete="off"/>
                        <x-jet-input-error for="fecha_fin_pago"/>
                    </div>
                </div>
                <div class="flex gap-x-6">
                    <div class="w-full">
                        <x-jet-label for="fecha_inicio_revision" value="Inicio de revisión"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_inicio_revision" autocomplete="off"/>
                        <x-jet-input-error for="fecha_inicio_revision"/>
                    </div>
                    <div class="w-full">
                        <x-jet-label for="fecha_fin_revision" value="Fin de revisión"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_fin_revision" autocomplete="off"/>
                        <x-jet-input-error for="fecha_fin_revision"/>
                    </div>
                </div>
                <div class="flex gap-x-6">
                    <div class="w-full">
                        <x-jet-label for="fecha_inicio_validacion" value="Inicio de validación"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_inicio_validacion" autocomplete="off"/>
                        <x-jet-input-error for="fecha_inicio_validacion"/>
                    </div>
                    <div class="w-full">
                        <x-jet-label for="fecha_fin_validacion" value="Fin de validación"/>
                        <x-jet-input type="date" class="mt-1 block w-full"
                                     wire:model="fecha_fin_validacion" autocomplete="off"/>
                        <x-jet-input-error for="fecha_fin_validacion"/>
                    </div>
                </div>

                <div class="flex justify-end">
                    <x-jet-button wire:click="crearPagos" wire:target="crearPagos"
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
                Aquí se mostrará las fechas programadas para los pagos.
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
