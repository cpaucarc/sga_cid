<x-app-layout>
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

    <div class="grid grid-cols-7 gap-6">
        <div class="col-span-5">
            <livewire:programacion.lista-meses :meses="$meses" :year="$year"
                                               :clase_modalidades="$clase_modalidades"/>
        </div>

        <div class="col-span-2">
            <x-app.director.mensual-info :mensual="$mensual" :meses="$meses"
                                         :clase_modalidades="$clase_modalidades"/>
        </div>
    </div>


</x-app-layout>
