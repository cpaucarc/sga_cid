<x-app-layout>
    <x-sidebar.grid>
        @slot('sidebar')
            <x-app.matricula.matricula-sidebar/>
        @endslot

        <div class="space-y-4">

            <livewire:matricula.lista-prematricula-director />
            <br>

            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores consequatur cum eaque eligendi iste
                modi nemo nobis recusandae saepe sapiente. A commodi consequatur consequuntur, esse expedita sunt unde.
                Explicabo, fugiat.
            </p>
        </div>

    </x-sidebar.grid>
</x-app-layout>
