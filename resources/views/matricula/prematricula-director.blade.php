<x-app-layout>
    <x-sidebar.grid>
        @slot('sidebar')
            <x-app.matricula.matricula-sidebar/>
        @endslot

        <div class="space-y-4">

            <x-titulo titulo="{{'Prematrícula: ' . $titulo }}">
                @slot('items')
                    <livewire:matricula.lista-mensuales mes="{{ $mensual->mes_id }}" year="{{ $mensual->anio }}"
                                                        :meses="$meses"/>
                @endslot
            </x-titulo>

            <livewire:matricula.lista-prematricula-director :mensual="$mensual" :meses="$meses"/>

        </div>

    </x-sidebar.grid>
</x-app-layout>
