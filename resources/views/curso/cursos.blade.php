<x-app-layout>

    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.curso.curso-sidebar/>
        @endslot

        <livewire:curso.lista-cursos :id="$id" />

    </x-sidebar.grid>

</x-app-layout>

