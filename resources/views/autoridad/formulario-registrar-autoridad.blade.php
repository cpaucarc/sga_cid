<x-app-layout>
    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.autoridad.autoridad-sidebar/>
        @endslot

        <livewire:autoridad.registrar-autoridad/>

    </x-sidebar.grid>
</x-app-layout>
