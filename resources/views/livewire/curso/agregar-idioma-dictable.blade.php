<div>
    <x-jet-dialog-modal wire:model="open" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-bold text-slate-700">{{ $titulo }}</h1>
        </x-slot>

        <x-slot name="content">

            <div class="grid grid-cols-2 gap-4">

                <div class="col-span-2 md:col-span-1">
                    <x-jet-label for="idioma" value="Idioma"/>
                    <x-forms.select id="idioma" class="w-full" wire:model="idioma">
                        @if(!$editar)
                            <option value="0">Todos los idiomas</option>
                        @endif
                        @foreach($idiomas as $idi => $idm)
                            <option value="{{ $idi }}">{{ $idm }}</option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-span-2 md:col-span-1">
                    <x-jet-label for="nivel" value="Nivel"/>
                    <x-forms.select id="nivel" class="w-full" wire:model="nivel">
                        @if(!$editar)
                            <option value="0">Todos los niveles</option>
                        @endif
                        @foreach($niveles as $idn => $nv)
                            <option value="{{ $idn }}">Nivel {{ $nv }}</option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-span-2 md:col-span-1">
                    <x-jet-label for="modalidad" value="Modalidad"/>
                    <x-forms.select id="modalidad" class="w-full" wire:model="modalidad">
                        @if(!$editar)
                            <option value="0">Todas las modalidades</option>
                        @endif
                        @foreach($modalidades as $idm => $mdl)
                            <option value="{{ $idm }}">
                                {{ $mdl['nombre'] }} ({{ $mdl['duracion_meses'] }} meses)
                            </option>
                        @endforeach
                    </x-forms.select>
                </div>

                <div class="col-span-2 md:col-span-1">
                    <x-jet-label for="precio" value="Precio Mensual"/>
                    <x-jet-input id="precio" class="w-full" wire:model.defer="precio" type="number" min="0"/>
                </div>

            </div>

        </x-slot>

        <x-slot name="footer">
            <x-buttons.save target="guardarDictable"/>
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
        <script>
            Livewire.on('guardado', msg => {
                console.log('Guardado', msg)
                sweetToast(msg, 'success');
            });
        </script>
    @endpush
</div>
