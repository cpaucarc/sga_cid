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
            <x-card>
                <x-slot:header>
                    <h2 class="font-bold text-zinc-600 mr-1">Lista de idomas ({{count($idiomas)}})</h2>
                </x-slot:header>
                @if(count($idiomas)>0)
                    <x-table.table>
                        @foreach($idiomas as $idioma)
                            <x-table.row>
                                <x-table.column>
                                    <x-forms.checkbox wire:model="idioma_selected"
                                                      wire:loading.attr="disabled"
                                                      value="{{ $idioma->id }}"/>
                                </x-table.column>
                                <x-table.column class="text-left">
                                    {{ $idioma->nombre }}
                                </x-table.column>
                            </x-table.row>
                        @endforeach
                    </x-table.table>
                @else
                    <x-message-image>
                        <x-slot:title>Genial</x-slot:title>
                        <x-slot:description>
                            Todos los idiomas han sido agregados al docente.
                        </x-slot:description>
                        {{--<x-slot:image>{{ asset('images/logo_cid.svg')  }}</x-slot:image>--}}
                    </x-message-image>
                @endif
            </x-card>
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
                <x-message-image>
                    <x-slot:title>No agregado</x-slot:title>
                    <x-slot:description>
                        Aún no se ha agredo ningun idioma al docente
                    </x-slot:description>
                    {{--<x-slot:image>{{ asset('images/logo_cid.svg')  }}</x-slot:image>--}}
                </x-message-image>
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
