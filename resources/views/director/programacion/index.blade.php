<x-app-layout>
    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.director.matricula-sidebar/>
        @endslot

        <x-titulo titulo="{{ 'Meses de ' . $year }}">
            @slot('items')
                @if($mensual)
                    <livewire:matricula.lista-mensuales mes="{{ $mensual->mes_id }}" year="{{ $mensual->anio }}"
                                                        :meses="$meses" ruta="director.matricula.programacion"/>
                @endif
                <x-links.primary href="{{ route('programacion.mensual.crear') }}">Registrar nuevo</x-links.primary>
            @endslot
        </x-titulo>

        <div class="grid grid-cols-9 gap-4">
            <div class="col-span-6">
                <livewire:programacion.lista-meses :meses="$meses" :year="$year"
                                                   :clase_modalidades="$clase_modalidades"/>
            </div>

            <div class="col-span-3">
                <x-app.director.mensual-info :mensual="$mensual" :meses="$meses"
                                             :clase_modalidades="$clase_modalidades"/>
            </div>


        </div>


    </x-sidebar.grid>
</x-app-layout>
