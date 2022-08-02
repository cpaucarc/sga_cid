<div class="space-y-4">
    Be like water.

    {{ $dictables }}

    <div class="flex space-x-2 items-center justify-end">
        <x-forms.select wire:model="idioma">
            <option value="0">Todos los idiomas</option>
            @foreach($idiomas as $idi => $idm)
                <option value="{{ $idi }}">{{ $idm }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.select wire:model="nivel">
            <option value="0">Todos los niveles</option>
            @foreach($niveles as $idn => $nv)
                <option value="{{ $idn }}">Nivel {{ $nv }}</option>
            @endforeach
        </x-forms.select>

        <x-forms.select wire:model="modalidad">
            <option value="0">Todas las modalidades</option>
            @foreach($modalidades as $idm => $mdl)
                <option value="{{ $idm }}">{{ $mdl }}</option>
            @endforeach
        </x-forms.select>
    </div>

    {{ $cursos }}
</div>
