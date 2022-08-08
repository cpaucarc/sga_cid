<div>
    <x-titulo
        titulo="Docente: {{$docente->persona->apellido_paterno}} {{$docente->persona->apellido_materno}} {{$docente->persona->nombres}}">
        @slot('subtitulo')
            <div class="rounded-md text-sm text-slate-700 flex flex-wrap gap-6 mt-2 relative">
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
                <article class="p-4 border border-zinc-300 rounded-xl">
                    <div class="flex items-center">
                        <img
                            src="{{ asset('images/online_world_bro.svg') }}"
                            alt="Mark Mead"
                            class="w-16 h-16 rounded-full"
                        />

                        <div class="ml-3">
                            <h5 class="text-lg font-medium text-gray-800">Lista de idiomas <span
                                    class="text-xs">({{count($idiomas)}})</span>
                            </h5>
                        </div>
                    </div>

                    <div class="mt-4 space-y-2">

                        @foreach($idiomas as $idioma)
                            <div
                                class="block flex items-center h-full p-4 border border-zinc-300 rounded-lg hover:border-pink-300">
                                <x-forms.checkbox wire:model="idioma_selected"
                                                  wire:loading.attr="disabled"
                                                  value="{{ $idioma->id }}"/>
                                <p class="font-medium text-gray-600">
                                    {{ $idioma->nombre }}
                                </p>
                            </div>
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
                            <x-table.column class="uppercase">{{$docid->idioma->nombre}}</x-table.column>
                            <x-table.column>
                                <x-jet-secondary-button wire:click="eliminarIdioma({{$docid->id}})"
                                                        class="btn-state-danger">
                                    Eliminar
                                </x-jet-secondary-button>
                            </x-table.column>
                        </x-table.row>
                    @endforeach
                </x-table.table>
            @else
                <x-empty-state title="¡No hay diomas del docente!"
                               description="Aún no ha agregado ningún idioma al docente. Seleccione cada una de los idiomas que el docente enseña en el Centro de Idiomas de la Unasam."
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
