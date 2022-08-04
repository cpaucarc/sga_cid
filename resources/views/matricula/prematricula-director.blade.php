<x-app-layout>
    <x-sidebar.grid>
        @slot('sidebar')
            <x-app.matricula.matricula-sidebar/>
        @endslot

        <div class="space-y-4">

            <x-titulo titulo="{{'Prematrícula: ' . $titulo }}"/>

            {{ $mensual }}

            <livewire:matricula.lista-prematricula-director/>

        </div>

    </x-sidebar.grid>
</x-app-layout>
