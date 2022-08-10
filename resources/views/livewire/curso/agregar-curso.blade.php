<div>
    <x-jet-dialog-modal wire:model="open" maxWidth="3xl">
        <x-slot name="title">
            <h1 class="font-bold">{{ $titulo }}</h1>
        </x-slot>

        <x-slot name="content">

            <x-forms.fieldset titulo="Información del idioma">
                <div class="grid grid-cols-7 gap-4">
                    <div class="col-span-7 md:col-span-2">
                        <x-jet-label for="idioma" value="Idioma"/>
                        <x-jet-input id="idioma" type="text" class="w-full" value="{{ $idioma }}"
                                     title="No puede editar este campo" disabled="true"/>
                    </div>

                    <div class="col-span-7 md:col-span-2">
                        <x-jet-label for="modalidad" value="Modalidad"/>
                        <x-jet-input id="modalidad" type="text" class="w-full" value="{{ $modalidad }}"
                                     title="No puede editar este campo" disabled="true"/>
                    </div>

                    <div class="col-span-7 md:col-span-2">
                        <x-jet-label for="nivel" value="Nivel"/>
                        <x-jet-input id="nivel" type="text" class="w-full" value="{{ $nivel }}"
                                     title="No puede editar este campo" disabled="true"/>
                        <x-jet-input-error for="cantidad"/>
                    </div>

                    <div class="col-span-7 md:col-span-1">
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
            <br>
            <x-forms.fieldset titulo="Información del curso">
                <div class="space-y-5 text-gray-4 text-sm">
                    <p>
                        <span class="font-bold">Código del curso:</span>
                        <span class="uppercase">{{ $codigo }}</span>
                    </p>
                    <p>
                        <span class="font-bold">Curso Pre-requisito:</span>
                        <span class="text-base">{{ $nombre_requisito }}</span>
                    </p>
                    <div class="grid grid-cols-6 gap-4">
                        <div class="col-span-6 md:col-span-2 relative">
                            <x-jet-label for="aforo_minimo" value="Aforo mínimo por cada grupo"/>
                            <x-jet-input id="aforo_minimo" type="number" min="0" class="w-full"
                                         wire:model.defer="aforo_minimo"/>
                            <label for="aforo_minimo"
                                   class="absolute text-sm text-gray-3 top-[33px] left-10">estudiantes</label>
                            <x-jet-input-error for="aforo_minimo"/>
                        </div>
                        <div class="col-span-6 md:col-span-2 relative">
                            <x-jet-label for="aforo_recomendado" value="Aforo recomendado"/>
                            <x-jet-input id="aforo_recomendado" type="number" min="0" class="w-full"
                                         wire:model.defer="aforo_recomendado"/>
                            <label for="aforo_recomendado"
                                   class="absolute text-sm text-gray-3 top-[33px] left-10">estudiantes</label>
                            <x-jet-input-error for="aforo_recomendado"/>
                        </div>
                        <div class="col-span-6 md:col-span-2 relative">
                            <x-jet-label for="aforo_maximo" value="Aforo máximo por cada grupo"/>
                            <x-jet-input id="aforo_maximo" type="number" min="0" class="w-full"
                                         wire:model.defer="aforo_maximo"/>
                            <label for="aforo_maximo"
                                   class="absolute text-sm text-gray-3 top-[33px] left-10">estudiantes</label>
                            <x-jet-input-error for="aforo_maximo"/>
                        </div>
                    </div>
                </div>
            </x-forms.fieldset>

        </x-slot>

        <x-slot name="footer">
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
