<x-app-layout>
    <x-app.programacion.grid>
        @slot('info')
            <livewire:programacion.info-programacion/>
        @endslot

        <livewire:programacion.mostrar-pago/>

        @slot('sidebar')
            <livewire:programacion.sidebar/>
        @endslot
    </x-app.programacion.grid>
</x-app-layout>
