<div>
    <x-jet-dialog-modal wire:model="open" maxWidth="3xl">
        <x-slot name="title">
            <h1 class="font-bold text-slate-700">{{ $titulo }}</h1>
        </x-slot>

        <x-slot name="content">

            <x-forms.fieldset titulo="Información del idioma">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 md:col-span-1">
                        <x-jet-label for="idioma" value="Idioma"/>
                        <x-jet-input id="idioma" type="text" class="w-full" value="{{ $idioma }}"
                                     title="No puede editar este campo" disabled="true"/>
                    </div>

                    <div class="col-span-3 md:col-span-1">
                        <x-jet-label for="modalidad" value="Modalidad"/>
                        <x-jet-input id="modalidad" type="text" class="w-full" value="{{ $modalidad }}"
                                     title="No puede editar este campo" disabled="true"/>
                    </div>

                    <div class="col-span-3 md:col-span-1">
                        <x-jet-label for="nivel" value="Nivel"/>
                        <x-jet-input id="nivel" type="text" class="w-full" value="{{ $nivel }}"
                                     title="No puede editar este campo" disabled="true"/>
                        <x-jet-input-error for="cantidad"/>
                    </div>
                </div>
            </x-forms.fieldset>
            <br>
            <x-forms.fieldset titulo="Información del curso">
                <p class="text-slate-800 mb-4">
                    <span class="font-bold text-sm">Código del curso:</span> <span
                        class="uppercase">{{ $codigo }}</span>
                </p>

                <div class="grid grid-cols-7 gap-4">
                    <div class="col-span-7 md:col-span-3 relative">
                        <x-jet-label for="aforo" value="Aforo máximo por cada grupo"/>
                        <x-jet-input id="aforo" type="number" min="0" class="w-full" wire:model.defer="aforo"
                                     autofocus/>
                        <label for="aforo" class="absolute text-sm text-slate-600 top-[26px] left-9">estudiantes</label>
                    </div>

                    <div class="col-span-7 md:col-span-3">
                        <x-jet-label for="requisito" value="Pre-requisito"/>
                        <x-jet-input id="requisito" disabled="true" type="text" class="w-full"
                                     value="{{ $nombre_requisito }}"/>
                    </div>

                    <div class="col-span-1">
                        <x-jet-label for="ciclo" value="Ciclo"/>
                        <x-forms.select id="ciclo" disabled="true" class="w-full text-center" wire:model="ciclo">
                            @foreach($ciclos as $id => $cl)
                                @if($modalidad != 'Avanzado')
                                    @if($id <= 10)
                                        <option value="{{ $id }}">{{ $cl }}</option>
                                    @endif
                                @else
                                    @if($id > 10 && $id <= 15)
                                        <option value="{{ $id }}">{{ $cl }}</option>
                                    @endif
                                @endif
                            @endforeach
                        </x-forms.select>
                    </div>
                </div>
            </x-forms.fieldset>

        </x-slot>

        <x-slot name="footer">
            <x-buttons.outline>
                Cancelar
            </x-buttons.outline>

            <x-buttons.save target="guardarCurso"/>
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
