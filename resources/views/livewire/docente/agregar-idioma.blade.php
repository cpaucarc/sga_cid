<div class="space-y-6">
    <x-titulo>
        @slot('titulo')
            Docente:
            <span class="uppercase">
                {{$docente->persona->apellido_paterno}} {{$docente->persona->apellido_materno}} {{$docente->persona->nombres}}
            </span>
        @endslot
        @slot('subtitulo')
            <div class="rounded text-sm text-gray-3 flex flex-wrap gap-6 mt-2 relative">
                <p><b>Código:</b> {{$docente->codigo}} </p>

                <p><b>DNI:</b> {{$docente->persona->dni}} </p>

                <p><b>Correo:</b> <a href="mailto:{{$docente->persona->correo}}"
                                     class="hover:underline">{{$docente->persona->correo}} </a></p>
            </div>
        @endslot
    </x-titulo>

    <div class="grid grid-cols-6 gap-12 items-start">
        <div class="col-span-2 sticky top-20">
            @if(count($idiomas)>0)
                <article class="p-4 border border-gray-1 rounded-lg">
                    <div class="flex items-center">
                        <img
                            src="{{ asset('images/online_world_bro.svg') }}"
                            alt="Mark Mead"
                            class="w-16 h-16 rounded-full"
                        />

                        <div class="ml-3">
                            <h5 class="text-lg font-medium text-gray-3">
                                Lista de idiomas <span class="text-xs">({{count($idiomas)}})</span>
                            </h5>
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">

                        @foreach($idiomas as $idioma)
                            <label
                                class="flex gap-x-2 items-center p-3 border border-gray-1 rounded-md bg-white hover:bg-gray-1/30 group cursor-pointer font-medium text-gray-3/90 hover:text-gray-4 soft-transition">
                                <x-forms.checkbox wire:model="idioma_selected" wire:loading.attr="disabled"
                                                  value="{{ $idioma->id }}"/>
                                <img src="https://countryflagsapi.com/svg/{{ $idioma->codigo_pais }}"
                                     class="h-6 rounded" alt="Bandera">
                                {{ $idioma->nombre }}
                            </label>
                        @endforeach
                    </div>
                </article>
            @else
                <x-empty-state title="¡No hay idiomas!"
                               description="Todos los idiomas disponibles han sido agregados al docente."
                               image="{{ asset('images/online_world_bro.svg') }}" w-text="5">
                </x-empty-state>
            @endif
        </div>

        <div class="col-span-4">
            @if(count($docente_idiomas)>0)
                <x-table.table>
                    @slot('head')
                        <x-table.head>N°</x-table.head>
                        <x-table.head>Código</x-table.head>
                        <x-table.head>Idioma</x-table.head>
                        <x-table.head><span class="sr-only">Acciones</span></x-table.head>
                    @endslot
                    @foreach($docente_idiomas as $i=>$docid)
                        <x-table.row>
                            <x-table.column class="uppercase">{{($i+1)}}</x-table.column>
                            <x-table.column class="uppercase">{{$docid->idioma->codigo}}</x-table.column>
                            <x-table.column class="uppercase">
                                <div class="flex items-center gap-x-2">
                                    <img src="https://countryflagsapi.com/svg/{{ $docid->idioma->codigo_pais }}"
                                         class="h-5 rounded-sm" alt="Bandera">
                                    {{$docid->idioma->nombre}}
                                </div>
                            </x-table.column>
                            <x-table.column>
                                <x-jet-secondary-button wire:click="eliminarIdioma({{$docid->id}})">
                                    <x-icons.delete class="icon-5" stroke="1.75"/>
                                    Quitar
                                </x-jet-secondary-button>
                            </x-table.column>
                        </x-table.row>
                    @endforeach
                </x-table.table>
            @else
                <x-empty-state wImage="3" wText="4" title="El docente no tiene asignado ningún idioma"
                               description="Aún no ha agregado ningún idioma al docente. Seleccione cada uno de los idiomas que el docente enseña en el Centro de Idiomas de la Unasam."
                               image="{{ asset('images/learning_languages_bro.svg') }}">
                </x-empty-state>
            @endif
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
