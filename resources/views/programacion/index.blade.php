<x-app-layout>
    <x-app.programacion.grid>
        @slot('info')
            <livewire:programacion.info-programacion/>
        @endslot

        <livewire:programacion.lista-meses/>

        @slot('sidebar')
            <x-app.programacion.programacion-sidebar/>
        @endslot
    </x-app.programacion.grid>
</x-app-layout>

