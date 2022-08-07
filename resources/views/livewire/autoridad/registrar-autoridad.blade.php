<div>
    <div class="space-y-4">
        <x-forms.fieldset titulo="Datos personales">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="apellido_paterno" value="Apellido Paterno"/>
                    <x-jet-input wire:model="apellido_paterno" type="text" class="w-full"/>
                    <x-jet-input-error for="apellido_paterno"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="apellido_materno" value="Apellido Materno"/>
                    <x-jet-input wire:model="apellido_materno" type="text" class="w-full"/>
                    <x-jet-input-error for="apellido_materno"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="nombres" value="Nombres"/>
                    <x-jet-input wire:model="nombres" type="text" class="w-full"/>
                    <x-jet-input-error for="nombres"/>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="dni" value="Dni"/>
                    <x-jet-input wire:model="dni" type="number" class="w-full"/>
                    <x-jet-input-error for="dni"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="correo" value="Correo"/>
                    <x-jet-input wire:model="correo" type="email" class="w-full"/>
                    <x-jet-input-error for="correo"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="celular" value="Celular"/>
                    <x-jet-input wire:model="celular" type="number" class="w-full"/>
                    <x-jet-input-error for="celular"/>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="fecha_nacimiento" value="Fecha de Nacimiento"/>
                    <x-jet-input wire:model="fecha_nacimiento" type="date" class="w-full"/>
                    <x-jet-input-error for="fecha_nacimiento"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="sexo" value="Sexo"/>
                    <x-forms.select class="w-full" wire:model="sexo">
                        @foreach($sexos as $id=>$so)
                            <option value="{{ $id }}">{{ $so }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-jet-input-error for="sexo"/>
                </div>

                <div class="col-span-3 md:col-span-1" wire:ignore>
                    <x-jet-label for="pais" value="Pais"/>
                    <x-forms.select class="w-full select2" wire:model="pais">
                        <option value="0">Seleccion un pais</option>
                        @foreach($paises as $ps)
                            <option value="{{ $ps->id }}">{{  $ps->nombre }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-jet-input-error for="pais"/>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                @if($pais)
                    <div class="col-span-3 md:col-span-1">
                        <div class="flex gap-x-2">
                            <x-jet-label for="departamento" value="Departamento"/>
                            <x-forms.optional-badge/>
                        </div>
                        <x-forms.select class="w-full" wire:model="departamento">
                            <option value="0">Seleccion un departamento</option>
                            @foreach($departamentos as $dep)
                                <option value="{{ $dep->id }}">{{  $dep->nombre }}</option>
                            @endforeach
                        </x-forms.select>
                        <x-jet-input-error for="departamento"/>
                    </div>
                @endif

                @if($departamento)
                    <div class="col-span-3 md:col-span-1">
                        <div class="flex gap-x-2">
                            <x-jet-label for="provincia" value="Provincia"/>
                            <x-forms.optional-badge/>
                        </div>
                        <x-forms.select class="w-full" wire:model="provincia">
                            <option value="0">Seleccion un departamento</option>
                            @foreach($provincias as $prov)
                                <option value="{{ $prov->id }}">{{  $prov->nombre }}</option>
                            @endforeach
                        </x-forms.select>
                        <x-jet-input-error for="provincia"/>
                    </div>
                @endif

                @if($provincia)
                    <div class="col-span-3 md:col-span-1">
                        <div class="flex gap-x-2">
                            <x-jet-label for="distrito" value="Distrito"/>
                            <x-forms.optional-badge/>
                        </div>
                        <x-forms.select class="w-full" wire:model="distrito">
                            <option value="0">Seleccion un distrito</option>
                            @foreach($distritos as $dist)
                                <option value="{{ $dist->id }}">{{  $dist->nombre }}</option>
                            @endforeach
                        </x-forms.select>
                        <x-jet-input-error for="distrito"/>
                    </div>
                @endif
            </div>
        </x-forms.fieldset>
        <x-forms.fieldset titulo="Cargo de la Autoridad">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="cargo" value="Cargo"/>
                    <x-forms.select class="w-full" wire:model="cargo">
                        <option value="0">Seleccione un cargo</option>
                        @foreach($autoridad_cargos as $id=>$cg)
                            <option value="{{ $id }}">{{ $cg }}</option>
                        @endforeach
                    </x-forms.select>
                    <x-jet-input-error for="cargo"/>
                </div>
            </div>
        </x-forms.fieldset>
        <div class="w-full flex justify-end">
            <x-buttons.save target="registrarAutoridad"/>
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
        <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
        <script src="https://code.jquery.com/jquery-3.6.0.slim.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script>
            document.addEventListener('livewire:load', function () {
                $('.select2').select2();
                $('.select2').on('change', function () {
                    @this.
                    set('pais', this.value);
                });
            })
        </script>
    @endpush
</div>
