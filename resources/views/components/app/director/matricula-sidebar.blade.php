<x-sidebar.group titulo="Meses">

    <x-sidebar.link href="{{ route('director.matricula.programacion') }}"
                    :active="request()->routeIs('director.matricula.programacion')">
        Programación
    </x-sidebar.link>

</x-sidebar.group>


<x-sidebar.group titulo="Matrícula" class="pt-4">

    <x-sidebar.link href="{{ route('director.matricula.prematricula') }}"
                    :active="request()->routeIs('director.matricula.prematricula')">
        Prematricula
    </x-sidebar.link>

</x-sidebar.group>
