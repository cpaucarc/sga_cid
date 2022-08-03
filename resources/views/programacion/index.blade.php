<x-app-layout>
    <x-app.programacion.grid>
        @slot('info')
            <a href="#" class="flex flex-col items-center space-y-2 p-4 border rounded-md">
                <p class="font-semibold text-gray-400 text-center">Mes activo</p>
                <h5 class="text-2xl font-bold text-blue-600 flex items-center">
                    <svg class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd"
                              d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                              clip-rule="evenodd"/>
                    </svg>
                    Agosto
                </h5>
                <p class="text-sm text-gray-500 text-center">La programación que realizé desde ahora será para este
                    mes.</p>
            </a>
        @endslot

        <livewire:programacion.lista-meses/>

        @slot('sidebar')
            <x-app.programacion.programacion-sidebar/>
        @endslot
    </x-app.programacion.grid>
</x-app-layout>

