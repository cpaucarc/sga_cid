<div>
    <x-jet-dialog-modal wire:model="open" maxWidth="4xl">
        <x-slot name="title">
            <h1 class="font-bold text-slate-700">Matrícula automática personalizada: {{ $curso_nombre }} </h1>
        </x-slot>

        <x-slot name="content">
            <div class="">
                <x-jet-label for="grupos" value="Cantidad de grupos"/>
                <x-jet-input id="grupos" type="number" min="0" wire:model="cant_grupos"/>
            </div>

            <div>
                <label>
                    <input type="radio" name="aforo" value="1">
                    Aforo recomendado ({{ $recomendado }} estudiantes)
                </label>

                <label>
                    <input type="radio" name="aforo" value="2">
                    Aforo maximo ({{ $maximo }} estudiantes)
                </label>

                <label>
                    <input type="radio" name="aforo" value="3">
                    Personalizado
                </label>
            </div>

            <x-dd>
                Grupos: {{ $cant_grupos }} <br>
                Curso Id: {{ $curso_id }} <br>
                Mensual Id: {{ $mensual_id }} <br>
                Recm: {{ $recomendado }} <br>
                Max: {{  $maximo }} <br>
                Prematriculados: {{  $prematriculados }}
            </x-dd>
        </x-slot>
    </x-jet-dialog-modal>
</div>
