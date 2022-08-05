<div class="space-y-4">
    @if($mensual)

        <x-dd>
            Mensual: {{ $mensual }}
        </x-dd>

        <div class="flex items-center justify-between text-sm">
            <span class="flex-shrink-0 ml-1 mr-3">
                {{ now()->format('d, M Y') }}
            </span>
            <div class="w-2 h-2 rounded-full bg-zinc-400"></div>
            <hr class="border border-zinc-400 border-dashed flex-1">
            <div class="w-2 h-2 rounded-full bg-zinc-400"></div>
            <span class="flex-shrink-0 mr-1 ml-3">
                {{ now()->format('d, M Y') }}
            </span>
        </div>

        <div class="flex items-center justify-between">
            <div class="flex space-x-2 items-center">
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

            <div class="flex gap-x-2 items-center">
                <x-jet-input type="number" min="2020" max="{{ now()->year }}" step="1" wire:model.defer="anio"/>
                <x-forms.select wire:model.defer="mes">
                    @forelse($mensuales as $msl)
                        <option value="{{ $msl->mes_id }}">{{ $meses[$msl->mes_id] }}</option>
                    @empty
                        <option value="0">No hay ningún mes</option>
                    @endforelse
                </x-forms.select>
                <x-jet-button wire:click="buscarDatos">Buscar</x-jet-button>
            </div>
        </div>

        <x-table.table>
            @slot('head')
                <x-table.head>N°</x-table.head>
                <x-table.head>Idioma</x-table.head>
                <x-table.head class="text-right">Precio Mensual</x-table.head>
                <x-table.head>Max. por grupo</x-table.head>
                <x-table.head><span class="sr-only">Acciones</span></x-table.head>
            @endslot

            @foreach($cursos as $i => $curso)
                <x-table.row>
                    <x-table.column>{{ $i + 1 }}</x-table.column>
                    <x-table.column class="whitespace-nowrap">
                        <p>
                        <span class="font-semibold">
                            {{ $idiomas[$curso->dictable->idioma_id] }} {{ $niveles[$curso->dictable->idioma_nivel_id] }}
                        </span>
                            <span class="font-black mr-1">{{ $ciclos[$curso->ciclo_id] }}</span>
                            ({{ $modalidades[$curso->dictable->modalidad_id] }})
                        </p>
                    </x-table.column>
                    <x-table.column class="text-right">S/. {{ $curso->dictable->precio_mensual }}</x-table.column>
                    <x-table.column>
                        {{ $curso->aforo_maximo }} estudiantes por grupo
                    </x-table.column>
                    <x-table.column>
                        <x-jet-secondary-button class="btn-state-transparent">
                            Editar
                        </x-jet-secondary-button>
                    </x-table.column>
                </x-table.row>
            @endforeach

        </x-table.table>
    @else
        No hay nada
    @endif
</div>
