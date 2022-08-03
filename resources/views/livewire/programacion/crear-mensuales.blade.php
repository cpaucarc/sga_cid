<div>
    <div class="space-y-4 px-4">
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
        <div class="flex gap-x-6">
            <div class="w-full">
                <x-jet-label for="modalidad" value="Modalidad"/>
                <x-forms.select wire:model="modalidad" class="w-full">
                    <option value="0">Todos las modalidades</option>
                    @foreach($modalidades as $ind => $mod)
                        <option value="{{ $ind }}">Modalidad {{ $mod }}</option>
                    @endforeach
                </x-forms.select>
                <x-jet-input-error for="modalidad"/>
            </div>
            <div class="w-full">
                <x-jet-label for="mes" value="Mes"/>
                <x-jet-input type="text" class="mt-1 block w-full" disabled
                             wire:model="mes" autocomplete="off"/>
                <x-jet-input-error for="mes"/>
            </div>
        </div>

        <div class="flex justify-end">
            <x-jet-button wire:click="crear" wire:target="crear"
                          wire:loading.class="cursor-wait" wire:loading.attr="disabled">
                {{ __('Crear') }}
            </x-jet-button>
        </div>
    </div>

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