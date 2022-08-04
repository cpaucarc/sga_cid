<div>
    <div class="space-y-4">
        <x-forms.fieldset titulo="Datos personales">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="apellido_paterno" value="Apellido Paterno"/>
                    <x-jet-input id="apellido_paterno" type="text" class="w-full"/>
                    <x-jet-input-error for="apellido_paterno"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="apellido_materno" value="Apellido Materno"/>
                    <x-jet-input id="apellido_materno" type="text" class="w-full"/>
                    <x-jet-input-error for="apellido_materno"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="nombres" value="Nombres"/>
                    <x-jet-input id="nombres" type="text" class="w-full"/>
                    <x-jet-input-error for="nombres"/>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="dni" value="Dni"/>
                    <x-jet-input id="dni" type="text" class="w-full"/>
                    <x-jet-input-error for="dni"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="correo" value="Correo"/>
                    <x-jet-input id="correo" type="email" class="w-full"/>
                    <x-jet-input-error for="correo"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="celular" value="Celular"/>
                    <x-jet-input id="celular" type="text" class="w-full"/>
                    <x-jet-input-error for="celular"/>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="fecha_nacimiento" value="Fecha de Nacimiento"/>
                    <x-jet-input id="fecha_nacimiento" type="text" class="w-full"/>
                    <x-jet-input-error for="fecha_nacimiento"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="sexo" value="Sexo"/>
                    <x-forms.select class="w-full text-center" wire:model="sexo">
                    </x-forms.select>
                    <x-jet-input-error for="sexo"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="pais" value="Pais"/>
                    <x-forms.select class="w-full text-center" wire:model="pais">
                    </x-forms.select>
                    <x-jet-input-error for="pais"/>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="departamento" value="Departamento"/>
                    <x-forms.select class="w-full text-center" wire:model="departamento">
                    </x-forms.select>
                    <x-jet-input-error for="departamento"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="provincia" value="Provincia"/>
                    <x-forms.select class="w-full text-center" wire:model="provincia">
                    </x-forms.select>
                    <x-jet-input-error for="provincia"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="distrito" value="Distrito"/>
                    <x-forms.select class="w-full text-center" wire:model="distrito">
                    </x-forms.select>
                    <x-jet-input-error for="distrito"/>
                </div>
            </div>
        </x-forms.fieldset>
        <x-forms.fieldset titulo="Información del CID">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="dedicacion" value="Dedicación"/>
                    <x-forms.select class="w-full text-center" wire:model="dedicacion">
                    </x-forms.select>
                    <x-jet-input-error for="dedicacion"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="categoria" value="Categoria"/>
                    <x-forms.select class="w-full text-center" wire:model="categoria">
                    </x-forms.select>
                    <x-jet-input-error for="categoria"/>
                </div>

                <div class="col-span-3 md:col-span-1">
                    <x-jet-label for="condicion" value="Condición"/>
                    <x-forms.select class="w-full text-center" wire:model="condicion">
                    </x-forms.select>
                    <x-jet-input-error for="condicion"/>
                </div>
            </div>
        </x-forms.fieldset>
        <div class="w-full flex justify-end">
            <x-buttons.save target="registrarDocente"/>
        </div>
    </div>
</div>
