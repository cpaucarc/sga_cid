<x-app-layout>

    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.curso.curso-sidebar/>
        @endslot

        <livewire:curso.lista-idiomas-dictables/>

    </x-sidebar.grid>

</x-app-layout>
