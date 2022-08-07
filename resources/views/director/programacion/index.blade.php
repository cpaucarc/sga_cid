<x-app-layout>
    <x-sidebar.grid>

        @slot('sidebar')
            <x-app.director.matricula-sidebar/>
        @endslot

        <x-titulo titulo="{{ 'Meses de ' . $year }}">
            @slot('items')
                @if($mensual)
                    <livewire:matricula.lista-mensuales mes="{{ $mensual->mes_id }}" year="{{ $mensual->anio }}"
                                                        :meses="$meses" ruta="director.matricula.programacion.index"/>
                @endif
                <x-links.primary href="{{ route('director.matricula.programacion.crear') }}">
                    Registrar nuevo
                </x-links.primary>
            @endslot
        </x-titulo>

        <livewire:programacion.lista-meses :meses="$meses" :year="$year"
                                           :clase_modalidades="$clase_modalidades"/>

        @slot('aside')
            <x-app.director.mensual-info :mensual="$mensual" :meses="$meses"
                                         :clase_modalidades="$clase_modalidades"/>
        @endslot

    </x-sidebar.grid>
</x-app-layout>
