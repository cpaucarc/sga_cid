<x-app-layout>
    <x-app.programacion.grid>
        @slot('info')
            <livewire:programacion.info-programacion/>
        @endslot

        <livewire:programacion.crear-prematricula/>

        @slot('sidebar')
            <livewire:programacion.programacion-sidebar/>
        @endslot
    </x-app.programacion.grid>
</x-app-layout>