<x-sidebar.group titulo="Meses">

    <x-sidebar.link href="{{ route('director.matricula.programacion.index') }}"
                    :active="request()->routeIs('director.matricula.programacion.*')">
        Programación
    </x-sidebar.link>

</x-sidebar.group>


<x-sidebar.group titulo="Matrícula" class="pt-4">

    <x-sidebar.link href="{{ route('director.matricula.prematricula.index') }}"
                    :active="request()->routeIs('director.matricula.prematricula.*')">
        Pre-matrícula
    </x-sidebar.link>

</x-sidebar.group>

