<div>
    <x-titulo titulo="Docentes del Centro de Idiomas">
        @slot('items')
            <x-links.primary href="#">{{ __('Nuevo') }}</x-links.primary>
        @endslot
    </x-titulo>
    <x-table.table>
        @slot('head')
            <x-table.head>N°</x-table.head>
            <x-table.head>Apellidos y Nombres</x-table.head>
            <x-table.head>DNI</x-table.head>
            <x-table.head>Correo</x-table.head>
            <x-table.head>Idiomas</x-table.head>
            <x-table.head><span class="sr-only">Acciones</span></x-table.head>
        @endslot

        <x-table.row>
            <x-table.column class="uppercase">1</x-table.column>
            <x-table.column class="uppercase">Segundo Hurtado Joseph Joel</x-table.column>
            <x-table.column class="whitespace-nowrap">46254625</x-table.column>
            <x-table.column class="whitespace-nowrap">jsegundoh@gmailcom</x-table.column>
            <x-table.column>
                <x-links.secondary class="btn-state-default">
                    4 idiomas
                </x-links.secondary>
            </x-table.column>
            <x-table.column>
                <x-jet-secondary-button class="btn-state-warning">
                    <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                </x-jet-secondary-button>
            </x-table.column>
        </x-table.row>
    </x-table.table>
</div>
