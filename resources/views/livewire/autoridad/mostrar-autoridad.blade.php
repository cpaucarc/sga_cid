<div>
    <div class="flex justify-between gap-x-6 items-center">
        <div class="space-y-2 flex-1">
            <h4 class="flex items-center text-sm text-gray-3 font-semibold tracking-wide">
                <x-icons.dni class="icon-5 mr-1"/>
                DNI {{ $autoridad->persona->dni }}
            </h4>
            <h3 class="text-xl text-gray-4 font-bold uppercase">
                {{$autoridad->persona->apellido_paterno}} {{$autoridad->persona->apellido_materno}} {{$autoridad->persona->nombres}}
                <span
                    class="bg-rose-3/10 text-rose-3 text-sm font-medium ml-2 px-2.5 py-1 rounded">{{$autoridad->persona->pais}}</span>
            </h3>
            <h4 class="flex items-center text-sm text-gray-3 font-semibold ">
                <x-icons.person class="icon-5 mr-1"/>
                {{ $autoridad_cargos[$autoridad->autoridad_cargo_id] }}
            </h4>
            <a class="flex items-center text-sm text-gray-3 tracking-wide hover:underline"
               href="mailto:{{ $autoridad->persona->correo }}">
                <x-icons.mail class="icon-5 mr-1"/>
                {{$autoridad->persona->correo}}
            </a>
            @if(!$autoridad->esta_activo)
                <p class="text-sm flex items-center text-rose-3">
                    <x-icons.warning class="icon-5 mr-1"/>
                    Actualmente esta autoridad está inactivo.
                </p>
            @endif
        </div>

        @if($autoridad->esta_activo)
            <x-jet-button color="danger"
                          wire:click="cambiarEstado({{ $autoridad->id }},{{$autoridad->esta_activo}})">
                <x-icons.x class="icon-5 mr-2"/>
                Inhabilitar
            </x-jet-button>
        @else
            <x-jet-button color="primary"
                          wire:click="cambiarEstado({{ $autoridad->id }},{{$autoridad->esta_activo}})">
                <x-icons.check class="icon-5 mr-2"/>
                Habilitar
            </x-jet-button>
        @endif
    </div>

    <hr class="border-t border-dashed border-gray-1 mt-2"/>

    <div class="grid grid-cols-6 gap-6 pt-6">
        <div class="col-span-2 space-y-6">
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Fecha de Nacimiento</h3>
                <p class="text-gray-3">
                    {{ $autoridad->persona->fecha_nacimiento->format('d') }}
                    de {{ $meses[intval($autoridad->persona->fecha_nacimiento->format('m'))] }}
                    del {{$autoridad->persona->fecha_nacimiento->format('Y')}}
                </p>
            </div>
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Género</h3>
                <p class="text-gray-3">
                    {{ $autoridad->persona->sexo_id === 1 ? 'Femenino':'Masculino' }}
                </p>
            </div>
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Celular</h3>
                <p class="text-gray-3">
                    {{ $autoridad->persona->celular }}
                </p>
            </div>
        </div>
        @if($distrito)
            <div class="col-span-2 space-y-6">
                <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                    <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Departamento</h3>
                    <p class="text-gray-3">
                        {{ $distrito->provincia->departamento }}
                    </p>
                </div>
                <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                    <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Provincia</h3>
                    <p class="text-gray-3">
                        {{ $distrito->provincia->nombre }}
                    </p>
                </div>
                <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                    <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Distrito</h3>
                    <p class="text-gray-3">
                        {{ $distrito->nombre }}
                    </p>
                </div>
            </div>
        @endif

        <div class="col-span-2 space-y-6">
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition mb-2">Cargo</h3>
                <x-jet-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <x-jet-secondary-button class="w-full justify-between">
                            {{ $autoridad_cargos[$autoridad->autoridad_cargo_id] }}
                            <svg class="icon-4" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </x-jet-secondary-button>
                    </x-slot>
                    <x-slot name="content">
                        @foreach($autoridad_cargos as $id => $cargo)
                            @if($id != $autoridad->autoridad_cargo_id)
                                <x-buttons.dropdown-button wire:click="cambiarCargo({{ $autoridad->id }},{{ $id }})">
                                    {{ $cargo }}
                                </x-buttons.dropdown-button>
                            @endif
                        @endforeach
                    </x-slot>
                </x-jet-dropdown>
            </div>
        </div>
    </div>
</div>
