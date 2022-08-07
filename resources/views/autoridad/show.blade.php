<x-app-layout>
    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.autoridad.autoridad-sidebar/>
        @endslot

        <livewire:autoridad.mostrar-autoridad :dni="$dni"/>

    </x-sidebar.grid>
</x-app-layout>
