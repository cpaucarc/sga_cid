<x-app-layout>
    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.docente.docente-sidebar/>
        @endslot

        <livewire:docente.mostrar-docente :codigo="$codigo"/>

    </x-sidebar.grid>
</x-app-layout>
