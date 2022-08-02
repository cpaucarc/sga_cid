<x-sidebar.group>

    <x-sidebar.link href="{{ route('curso.index') }}" :active="request()->routeIs('curso.index')">
        Idiomas dictables
    </x-sidebar.link>

    <x-sidebar.link href="{{ route('curso.cursos') }}" :active="request()->routeIs('curso.cursos')">
        Cursos
    </x-sidebar.link>

    <x-sidebar.link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
        @slot('icon')
            <svg class="icon-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        @endslot
        Link a Dashboard
    </x-sidebar.link>
</x-sidebar.group>

<x-sidebar.group class="pt-4" titulo="Grupo de prueba">
    <x-sidebar.link href="#" :active="request()->routeIs('dashboard')">
        @slot('icon')
            <svg class="icon-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
            </svg>
        @endslot

        Otro link
    </x-sidebar.link>
</x-sidebar.group>
