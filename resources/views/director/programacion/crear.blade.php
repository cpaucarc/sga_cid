<x-app-layout>
    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.director.matricula-sidebar/>
        @endslot

        <div class="grid grid-cols-9 gap-4">
            <div class="col-span-6">
                <livewire:programacion.crear-mensuales/>
            </div>

            <div class="col-span-3">
                {{--                    <x-app.director.mensual-info :mensual="$mensual" :meses="$meses"--}}
                {{--                                                 :clase_modalidades="$clase_modalidades"/>--}}
            </div>
        </div>

    </x-sidebar.grid>
</x-app-layout>
