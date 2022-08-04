<div>
    <x-titulo
        titulo="Docente: SEGUNDO HURTADO JOSEPH JOEL">
        @slot('subtitulo')
            <div class="rounded-md text-sm text-slate-700 flex flex-wrap gap-6 mt-2 relative">
                <p><b>Código:</b> 22.1.124</p>

                <p><b>DNI:</b>46254625</p>

                <p><b>Correo:</b>jsegundoh@gmailcom</p>
            </div>
        @endslot

        @slot('items')
            <x-jet-secondary-button onclick="" class="btn-state-default">
                Agregar idiomas
            </x-jet-secondary-button>
        @endslot
    </x-titulo>

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

    <x-jet-dialog-modal wire:model="open" maxWidth="3xl">
        <x-slot name="title">
            <h1 class="font-bold text-slate-700">{{ $titulo }}</h1>
        </x-slot>

        <x-slot name="content">

            <x-forms.fieldset titulo="Información del idioma">
                <div class="grid grid-cols-3 gap-4">
                    <div class="col-span-3 md:col-span-1">
                        <x-jet-label for="nombres" value="Idioma"/>
                        <x-jet-input id="nombres" type="text" class="w-full" value="{{ $idioma }}"
                                     title="No puede editar este campo" disabled="true"/>
                    </div>

                    <div class="col-span-3 md:col-span-1">
                        <x-jet-label for="codigo" value="Modalidad"/>
                        <x-jet-input id="codigo" type="text" class="w-full" value="{{ $modalidad }}"
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
