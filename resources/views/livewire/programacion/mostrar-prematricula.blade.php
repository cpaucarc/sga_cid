<div class="space-y-4">
    <div class="flex justify-between items-center">
        <div class="btn-state-default px-2.5 py-0.5 rounded text-sm">Año: {{$anio_actual}}        </div>
    </div>
    @if($prematricula)
        <x-table.table>
            @slot('head')
                <x-table.head>Inicio</x-table.head>
                <x-table.head>Fin</x-table.head>
            @endslot
            <x-table.row>
                <x-table.column>
                    {{$prematricula->fecha_inicio->format('d')}}
                    de {{$meses[intval($prematricula->fecha_inicio->format('m'))]}}
                </x-table.column>
                <x-table.column>
                    {{$prematricula->fecha_fin->format('d')}}
                    de {{$meses[intval($prematricula->fecha_fin->format('m'))]}}
                </x-table.column>
            </x-table.row>
        </x-table.table>
    @else
        <div class="w-full flex flex-col items-center space-y-4">
            <p class="text-gray-600">Auno no programa ninguna fecha</p>
            <x-links.primary href="#">{{ __('Crear') }}</x-links.primary>
        </div>
    @endif
</div>
