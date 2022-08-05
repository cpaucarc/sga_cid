<div>
    <div class="space-y-6">

        <x-alerta tipo="{{ $ultimo_mensual ? 'info' : 'danger' }}">
            Ultimo registro creado:
            <b>{{ $ultimo_mensual ? $meses[$ultimo_mensual->mes_id] . ' de ' . $ultimo_mensual->anio : 'Ninguno' }}</b>
        </x-alerta>

        <x-titulo>
            @slot('titulo')
                Nuevo mes: <span
                    class="text-blue-600 font-black tracking-wide">{{ $meses[$mes] }} de {{ $anio }}</span>
            @endslot
        </x-titulo>

        <div class="space-y-4 divide-y divide-dashed divide-slate-200">
            <div class="grid grid-cols-7 gap-3">
                <p class="font-bold mt-1 text-sm text-slate-600 col-span-2">Datos Generales</p>
                <div class="space-y-3 col-span-5">
                    <div class="flex items-center gap-x-4">
                        <x-jet-label for="modalidad">Modalidad</x-jet-label>
                        <x-forms.select wire:model="modalidad" id="modalidad">
                            @foreach($modalidades as $ind => $mod)
                                <option value="{{ $ind }}">Modalidad {{ $mod }}</option>
                            @endforeach
                        </x-forms.select>
                    </div>
                    <div class="items-center">
                        <label class="text-sm text-slate-700" for="fecha_inicio">Clases desde</label>
                        <input type="date" id="fecha_inicio"
                               class="input-none w-32 text-blue-600 hover:text-blue-700"
                               wire:model="fecha_inicio"/>
                        <label class="text-sm text-slate-700" for="fecha_fin">hasta</label>
                        <input type="date" id="fecha_fin"
                               class="input-none w-32 text-blue-600 hover:text-blue-700"
                               wire:model="fecha_fin"/>
                        <div class="flex flex-col space-y-1">
                            <x-jet-input-error for="fecha_inicio"/>
                            <x-jet-input-error for="fecha_fin"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-7 gap-3 items-center pt-4">
                <p class="font-bold mt-1 text-sm text-slate-600 col-span-2">Pre-matrícula</p>
                <div class="col-span-5 items-center">
                    <label class="text-sm text-slate-700" for="inicio_prematricula">Desde</label>
                    <input type="date" id="inicio_prematricula"
                           class="input-none w-32 text-blue-600 hover:text-blue-700"
                           wire:model="inicio_prematricula"/>
                    <label class="text-sm text-slate-700" for="fin_prematricula">hasta</label>
                    <input type="date" id="fin_prematricula"
                           class="input-none w-32 text-blue-600 hover:text-blue-700"
                           wire:model="fin_prematricula"/>
                    <div class="flex flex-col space-y-1">
                        <x-jet-input-error for="inicio_prematricula"/>
                        <x-jet-input-error for="fin_prematricula"/>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-7 gap-3 items-center pt-4">
                <p class="font-bold mt-1 text-sm text-slate-600 col-span-2">Matrícula</p>
                <div class="col-span-5 items-center">
                    <label class="text-sm text-slate-700" for="inicio_matricula">Desde</label>
                    <input type="date" id="inicio_matricula"
                           class="input-none w-32 text-blue-600 hover:text-blue-700"
                           wire:model="inicio_matricula"/>
                    <label class="text-sm text-slate-700" for="fin_matricula">hasta</label>
                    <input type="date" id="fin_matricula"
                           class="input-none w-32 text-blue-600 hover:text-blue-700"
                           wire:model="fin_matricula"/>
                    <div class="flex flex-col space-y-1">
                        <x-jet-input-error for="inicio_matricula"/>
                        <x-jet-input-error for="fin_matricula"/>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-7 gap-3 pt-4">
                <p class="font-bold mt-1 text-sm text-slate-600 col-span-2">Pagos</p>
                <div class="space-y-3 col-span-5">
                    <div class="items-center">
                        <label class="text-sm text-slate-700" for="inicio_pago">Pagos desde</label>
                        <input type="date" id="inicio_pago"
                               class="input-none w-32 text-blue-600 hover:text-blue-700"
                               wire:model="inicio_pago"/>
                        <label class="text-sm text-slate-700" for="fin_pago">hasta</label>
                        <input type="date" id="fin_pago"
                               class="input-none w-32 text-blue-600 hover:text-blue-700"
                               wire:model="fin_pago"/>
                        <div class="flex flex-col space-y-1">
                            <x-jet-input-error for="inicio_pago"/>
                            <x-jet-input-error for="fin_pago"/>
                        </div>
                    </div>
                    <div class="items-center">
                        <label class="text-sm text-slate-700" for="inicio_revision">Revisión desde</label>
                        <input type="date" id="inicio_revision"
                               class="input-none w-32 text-blue-600 hover:text-blue-700"
                               wire:model="inicio_revision"/>
                        <label class="text-sm text-slate-700" for="fin_revision">hasta</label>
                        <input type="date" id="fin_revision"
                               class="input-none w-32 text-blue-600 hover:text-blue-700"
                               wire:model="fin_revision"/>
                        <div class="flex flex-col space-y-1">
                            <x-jet-input-error for="inicio_revision"/>
                            <x-jet-input-error for="fin_revision"/>
                        </div>
                    </div>
                    <div class="items-center">
                        <label class="text-sm text-slate-700" for="inicio_validacion">Validación desde</label>
                        <input type="date" id="inicio_validacion"
                               class="input-none w-32 text-blue-600 hover:text-blue-700"
                               wire:model="inicio_validacion"/>
                        <label class="text-sm text-slate-700" for="fin_validacion">hasta</label>
                        <input type="date" id="fin_validacion"
                               class="input-none w-32 text-blue-600 hover:text-blue-700"
                               wire:model="fin_validacion"/>
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
