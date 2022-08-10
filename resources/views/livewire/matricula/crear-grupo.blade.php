<div>
    <x-jet-dialog-modal wire:model="open_modal_crear_grupo" maxWidth="xl">
        <x-slot name="title">
            <h1 class="font-bold text-slate-700">Crear nuevo grupo para {{ $curso_nombre }} </h1>
        </x-slot>

        <x-slot name="content">

            <div class="space-y-4">
                <h3 class="font-bold">{{ $grupo_nombre }}</h3>

                <div>
                    <x-jet-label for="docente" value="Docente del curso"/>
                    <x-forms.select id="docente" wire:model="docente">
                        <option value="0">Ninguno</option>
                        @if(!is_null($docentes) && count($docentes))
                            @foreach($docentes as $dct)
                                <option value="{{ $dct->id }}">
                                    {{ $dct->apellido_paterno }} {{ $dct->apellido_materno }} {{ $dct->nombres }}
                                </option>
                            @endforeach
                        @endif
                    </x-forms.select>
                </div>
            </div>
        </x-slot>

        <x-slot name="footer">
            <x-buttons.save target="crearNuevoGrupo" />
        </x-slot>
    </x-jet-dialog-modal>

    @push('js')
        <script>
            Livewire.on('creado', msg => {
                console.log('Creado', msg)
                sweetToast(msg, 'success');
            });
        </script>
    @endpush
</div>
