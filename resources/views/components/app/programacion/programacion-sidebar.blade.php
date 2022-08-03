<x-sidebar.group>

    <x-app.programacion.sidebar-link href="{{ route('curso.index') }}" :active="request()->routeIs('curso.index')">
        @slot('icon')
            <svg class="icon-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        @endslot
        Prematrícula
    </x-app.programacion.sidebar-link>

    <x-app.programacion.sidebar-link href="{{ route('curso.index') }}" :active="request()->routeIs('curso.index')">
        @slot('icon')
            <svg class="icon-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        @endslot
        Matrícula
    </x-app.programacion.sidebar-link>
</x-sidebar.group>

<x-sidebar.group class="pt-4">
    <x-app.programacion.sidebar-link href="{{ route('curso.index') }}" :active="request()->routeIs('curso.index')">
        @slot('icon')
            <svg class="icon-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                 xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path>
            </svg>
        @endslot
        Pagos
    </x-app.programacion.sidebar-link>
</x-sidebar.group>
