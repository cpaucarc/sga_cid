<x-app-layout>
    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.docente.docente-sidebar/>
        @endslot

        <livewire:docente.mostrar-docente :uuid="$uuid"/>

    </x-sidebar.grid>
</x-app-layout>
