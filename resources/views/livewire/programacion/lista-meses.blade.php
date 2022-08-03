<div class="space-y-4">
    <div class="flex justify-between items-center">
        <span class="bg-blue-100 text-blue-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-blue-200 dark:text-blue-800">2022</span>
        <x-jet-button>{{ __('Crear') }}</x-jet-button>
    </div>
    <x-table.table>
        @slot('head')
            <x-table.head>Mes</x-table.head>
            <x-table.head>Estado</x-table.head>
            <x-table.head>Action</x-table.head>
        @endslot
        <x-table.row>
            <x-table.column class="uppercase">Agosto</x-table.column>
            <x-table.column class="uppercase">Activo</x-table.column>
            <x-table.column>
                <x-links.secondary href="#"
                                   class="btn-state-transparent">
                    Eliminar
                </x-links.secondary>
            </x-table.column>
        </x-table.row>
    </x-table.table>
</div>
