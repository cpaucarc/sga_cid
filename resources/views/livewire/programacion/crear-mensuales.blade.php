<div>
    <div class="space-y-8">

        <x-alerta tipo="{{ $ultimo_mensual ? 'info' : 'danger' }}">
            Ultimo registro creado:
            <b>{{ $ultimo_mensual ? $meses[$ultimo_mensual->mes_id] . ' de ' . $ultimo_mensual->anio : 'Ninguno' }}</b>
        </x-alerta>

        <x-titulo>
            @slot('titulo')
                Nuevo mes: <span
                    class="text-blue-3 font-extrabold tracking-wide">{{ $meses[$mes] }} de {{ $anio }}</span>
            @endslot
        </x-titulo>

        <div class="space-y-6 divide-y divide-dashed divide-gray-1">
            <div class="grid grid-cols-8 gap-3">
                <p class="font-bold mt-1 text-sm text-gray-3 col-span-2">Datos Generales</p>
                <div class="space-y-4 col-span-6">
                    <div class="flex items-center gap-x-4">
                        <x-jet-label for="modalidad">Modalidad</x-jet-label>
                        <x-forms.select wire:model="modalidad" id="modalidad">
                            @foreach($modalidades as $ind => $mod)
                                <option value="{{ $ind }}">Clases {{ $mod }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                    <div class="items-center">
                        <label class="text-sm text-gray-3" for="fecha_inicio">Clases desde</label>
                        <x-jet-input type="date" class="w-36" id="fecha_inicio" wire:model="fecha_inicio"/>
                        <label class="text-sm text-gray-3" for="fecha_fin">hasta</label>
                        <x-jet-input type="date" class="w-36" id="fecha_fin" wire:model="fecha_fin"/>
                        <div class="flex flex-col space-y-1">
                            <x-jet-input-error for="fecha_inicio"/>
                            <x-jet-input-error for="fecha_fin"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-8 gap-3 items-center pt-6">
                <p class="font-bold mt-1 text-sm text-gray-3 col-span-2">Pre-matrícula</p>
                <div class="col-span-6 items-center">
                    <label class="text-sm text-gray-3" for="inicio_prematricula">Desde</label>
                    <x-jet-input type="date" class="w-36" id="inicio_prematricula" wire:model="inicio_prematricula"/>
                    <label class="text-sm text-gray-3" for="fin_prematricula">hasta</label>
                    <x-jet-input type="date" class="w-36" id="fin_prematricula" wire:model="fin_prematricula"/>
                    <div class="flex flex-col space-y-1">
                        <x-jet-input-error for="inicio_prematricula"/>
                        <x-jet-input-error for="fin_prematricula"/>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-8 gap-3 items-center pt-6">
                <p class="font-bold mt-1 text-sm text-gray-3 col-span-2">Matrícula</p>
                <div class="col-span-6 items-center">
                    <label class="text-sm text-gray-3" for="inicio_matricula">Desde</label>
                    <x-jet-input type="date" class="w-36" id="inicio_matricula" wire:model="inicio_matricula"/>
                    <label class="text-sm text-gray-3" for="fin_matricula">hasta</label>
                    <x-jet-input type="date" class="w-36" id="fin_matricula" wire:model="fin_matricula"/>
                    <div class="flex flex-col space-y-1">
                        <x-jet-input-error for="inicio_matricula"/>
                        <x-jet-input-error for="fin_matricula"/>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-8 gap-3 pt-4">
                <p class="font-bold mt-1 text-sm text-gray-3 col-span-2">Pagos</p>
                <div class="space-y-6 col-span-6">
                    <div class="items-center">
                        <label class="text-sm text-gray-3" for="inicio_pago">Pagos desde</label>
                        <x-jet-input type="date" class="w-36" id="inicio_pago" wire:model="inicio_pago"/>
                        <label class="text-sm text-gray-3" for="fin_pago">hasta</label>
                        <x-jet-input type="date" class="w-36" id="fin_pago" wire:model="fin_pago"/>
                        <div class="flex flex-col space-y-1">
                            <x-jet-input-error for="inicio_pago"/>
                            <x-jet-input-error for="fin_pago"/>
                        </div>
                    </div>
                    <div class="items-center">
                        <label class="text-sm text-gray-3" for="inicio_revision">Revisión desde</label>
                        <x-jet-input type="date" class="w-36" id="inicio_revision" wire:model="inicio_revision"/>
                        <label class="text-sm text-gray-3" for="fin_revision">hasta</label>
                        <x-jet-input type="date" class="w-36" id="fin_revision" wire:model="fin_revision"/>
                        <div class="flex flex-col space-y-1">
                            <x-jet-input-error for="inicio_revision"/>
                            <x-jet-input-error for="fin_revision"/>
                        </div>
                    </div>
                    <div class="items-center">
                        <label class="text-sm text-gray-3" for="inicio_validacion">Validación desde</label>
                        <x-jet-input type="date" class="w-36" id="inicio_validacion" wire:model="inicio_validacion"/>
                        <label class="text-sm text-gray-3" for="fin_validacion">hasta</label>
                        <x-jet-input type="date" class="w-36" id="fin_validacion" wire:model="fin_validacion"/>
                        <div class="flex flex-col space-y-1">
                            <x-jet-input-error for="inicio_validacion"/>
                            <x-jet-input-error for="fin_validacion"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex justify-end">
            <x-buttons.save target="crear"/>
        </div>
    </div>

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
