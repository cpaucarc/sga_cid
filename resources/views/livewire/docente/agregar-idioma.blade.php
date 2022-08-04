<div>
    <x-titulo
        titulo="Docente: {{$docente->persona->apellido_paterno}} {{$docente->persona->apellido_materno}} {{$docente->persona->nombres}}">
        @slot('subtitulo')
            <div class="rounded-md text-sm text-slate-700 flex flex-wrap gap-6 mt-2 relative">
                <p><b>Código:</b> {{$docente->persona->codigo}}</p>

                <p><b>DNI:</b>{{$docente->persona->dni}}</p>

                <p><b>Correo:</b>{{$docente->persona->correo}}</p>
            </div>
        @endslot

        @slot('items')
            <x-jet-secondary-button onclick="" class="btn-state-default">
                Agregar idiomas
            </x-jet-secondary-button>
        @endslot
    </x-titulo>

    <div class="grid grid-cols-6 gap-6 items-start">
        <div class="col-span-2 sticky top-20">
            <section class="border border-zinc-300 divide-y divide-zinc-300 rounded-md text-zinc-700">
                <header class="px-3 py-2 rounded-t-md bg-stone-100">
                    <h2 class="font-bold text-zinc-600 mr-1">Sección de Facultades</h2>
                    <p class="text-sm">

                    </p>
                </header>

                <div class="divide-y divide-zinc-300">
                    <table class="divide-y divide-zinc-300 w-full overflow-hidden">
                        <tbody class="text-sm text-zinc-700 divide-y divide-zinc-300">
                        @foreach($facultades as $facultad)
                            <tr class="hover:bg-zinc-100 soft-transition">
                                <td class="px-3 py-1.5 text-left ">
                                    <x-utils.forms.checkbox wire:model="facultades_selected"
                                                            wire:loading.attr="disabled"
                                                            value="{{ $facultad->id }}"/>
                                </td>
                                <td class="px-3 py-1.5 text-left">{{ $facultad->nombre }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        <div class="col-span-4">
            <x-table.table>
                @slot('head')
                    <x-table.head>N°</x-table.head>
                    <x-table.head>Código</x-table.head>
                    <x-table.head>Idioma</x-table.head>
                    <x-table.head><span class="sr-only">Acciones</span></x-table.head>
                @endslot

                <x-table.row>
                    <x-table.column class="uppercase">1</x-table.column>
                    <x-table.column class="uppercase">F35SFS45</x-table.column>
                    <x-table.column class="uppercase">Ingles</x-table.column>
                    <x-table.column>
                        <x-jet-secondary-button wire:click="" class="btn-state-transparent">
                            Editar
                        </x-jet-secondary-button>
                    </x-table.column>
                </x-table.row>
            </x-table.table>
        </div>
    </div>


    <x-jet-dialog-modal wire:model="open" maxWidth="3xl">
        <x-slot name="title">
            <h1 class="font-bold text-slate-700">Modal</h1>
        </x-slot>

        <x-slot name="content">

            <x-forms.fieldset titulo="Información del idioma">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 md:col-span-1">
                        <x-jet-label for="nombres" value="Idioma"/>
                        <x-jet-input id="nombres" type="text" class="w-full" value=""
                                     title="No puede editar este campo" disabled="true"/>
                    </div>

                    <div class="col-span-3 md:col-span-1">
                        <x-jet-label for="codigo" value="Modalidad"/>
                        <x-jet-input id="codigo" type="text" class="w-full" value=""
                                     title="No puede editar este campo" disabled="true"/>
                    </div>

                    <div class="col-span-3 md:col-span-1">
                        <x-jet-label for="idioma" value="Ciclo"/>
                        <x-forms.select id="idioma" disabled="true" class="w-full text-center" wire:model="idioma">
                        </x-forms.select>
                        <x-jet-input-error for="cantidad"/>
                    </div>
                </div>
            </x-forms.fieldset>
        </x-slot>

        <x-slot name="footer">
            <x-buttons.save target="agregarIdioma"/>
        </x-slot>
    </x-jet-dialog-modal>
</div>
