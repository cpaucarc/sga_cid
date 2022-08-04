<x-app-layout>
    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.docente.docente-sidebar/>
        @endslot

        <livewire:docente.registrar-docente/>

    </x-sidebar.grid>
</x-app-layout>
