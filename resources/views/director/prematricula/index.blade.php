<x-app-layout>
    <x-sidebar.grid>
        @slot('sidebar')
            <x-app.director.matricula-sidebar/>
        @endslot

        <div class="space-y-4">

            <x-titulo>
                @slot('titulo')
                    <span class="{{ $mensual->esta_activo ? 'text-blue-600' : '' }}">Prematrícula: {{ $titulo }}</span>
                @endslot
                @slot('items')
                    <livewire:matricula.lista-mensuales mes="{{ $mensual->mes_id }}" year="{{ $mensual->anio }}"
                                                        :meses="$meses" ruta="director.matricula.prematricula.index"/>
                @endslot
            </x-titulo>

            <livewire:matricula.lista-prematricula-director :mensual="$mensual" :meses="$meses"/>

        </div>

    </x-sidebar.grid>
</x-app-layout>
