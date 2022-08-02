<div>

    <x-table.table>
        @slot('head')
            <x-table.head>Codigo</x-table.head>
            <x-table.head>Prerequisito</x-table.head>
            <x-table.head>Idioma</x-table.head>
            <x-table.head>Modalidad</x-table.head>
            <x-table.head>Nivel</x-table.head>
            <x-table.head class="text-right">Precio Mensual</x-table.head>
            <x-table.head>Duración</x-table.head>
            <x-table.head>Action</x-table.head>
        @endslot

        @foreach($idiomas_dictables as $idioma_dictable)
            <x-table.row>
                <x-table.column>{{ $idioma_dictable->codigo }}</x-table.column>
                <x-table.column>{{ $idioma_dictable->requisito }}</x-table.column>
                <x-table.column>{{ $idioma_dictable->idioma->nombre }}</x-table.column>
                <x-table.column>{{ $idioma_dictable->modalidad_id }}</x-table.column>
                <x-table.column>{{ $idioma_dictable->idioma_nivel_id }}</x-table.column>
                <x-table.column class="text-right">S/. {{ $idioma_dictable->precio_mensual }}</x-table.column>
                <x-table.column>{{ $idioma_dictable->duracion_meses }} meses</x-table.column>
                <x-table.column>Editar</x-table.column>
            </x-table.row>
        @endforeach

    </x-table.table>


</div>
