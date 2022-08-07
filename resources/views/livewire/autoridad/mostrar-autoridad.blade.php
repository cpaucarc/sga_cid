<div>
    <div class="grid grid-cols-6 gap-x-6 items-center">
        <div class="col-span-5 space-y-2">
            <h4 class="flex items-center text-sm text-gray-600 font-semibold tracking-wide">
                <svg class="mr-1" fill="currentColor" viewBox="0 0 16 16" width="16" height="16">
                    <path
                        d="M3 7.5a.5.5 0 01.5-.5h2a.5.5 0 01.5.5v3a.5.5 0 01-.5.5h-2a.5.5 0 01-.5-.5v-3zm10 .25a.75.75 0 01-.75.75h-4.5a.75.75 0 010-1.5h4.5a.75.75 0 01.75.75zM10.25 11a.75.75 0 000-1.5h-2.5a.75.75 0 000 1.5h2.5z"></path>
                    <path fill-rule="evenodd"
                          d="M7.25 0A1.75 1.75 0 005.5 1.75V3H1.75A1.75 1.75 0 000 4.75v8.5C0 14.216.784 15 1.75 15h12.5A1.75 1.75 0 0016 13.25v-8.5A1.75 1.75 0 0014.25 3H10.5V1.75A1.75 1.75 0 008.75 0h-1.5zm3.232 4.5A1.75 1.75 0 018.75 6h-1.5a1.75 1.75 0 01-1.732-1.5H1.75a.25.25 0 00-.25.25v8.5c0 .138.112.25.25.25h12.5a.25.25 0 00.25-.25v-8.5a.25.25 0 00-.25-.25h-3.768zM7 1.75a.25.25 0 01.25-.25h1.5a.25.25 0 01.25.25v2.5a.25.25 0 01-.25.25h-1.5A.25.25 0 017 4.25v-2.5z"></path>
                </svg>
                Dni {{ $autoridad->persona->dni }}
            </h4>
            <h3 class="text-2xl text-black font-bold">
                {{$autoridad->persona->apellido_paterno}} {{$autoridad->persona->apellido_materno}} {{$autoridad->persona->nombres}}
                <span
                    class="bg-red-100 text-red-800 text-sm font-medium ml-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{$autoridad->persona->pais}}</span>
            </h3>
            <h4 class="flex items-center text-sm text-blue-800 font-semibold ">
                <svg class="icon-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                </svg>
                {{ $autoridad_cargos[$autoridad->autoridad_cargo_id] }}
            </h4>
            @if(!$autoridad->esta_activo)
                <p class="text-sm flex items-center text-red-600">
                    <x-icons.warning class="h-5 w-5 mr-1 text-red-500"/>
                    Actualmente esta autoridad está inactivo.
                </p>
            @endif
            <a class="flex items-center text-sm text-gray-600 tracking-wide hover:underline"
               href="mailto:{{ $autoridad->persona->correo }}">
                <svg class="icon-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                {{$autoridad->persona->correo}}
            </a>
        </div>
        <div class="col-span-1">
            <x-jet-secondary-button wire:click="cambiarEstado({{ $autoridad->id }},{{$autoridad->esta_activo}})"
                                    class="text-sm {{ $autoridad->esta_activo ? 'btn-state-danger' :'btn-state-default'}}">
                <svg class="mr-1" fill="currentColor" viewBox="0 0 16 16" width="16" height="16">
                    <path fill-rule="evenodd"
                          d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                </svg>
                {{ $autoridad->esta_activo ? "Desactivar" : "Activar" }}
            </x-jet-secondary-button>
        </div>
    </div>

    <div class="grid grid-cols-6 gap-6 pt-6">
        <div class="col-span-2 space-y-6">
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Fecha de
                    nacimiento</h3>
                <p class="text-zinc-600">
                    {{ $autoridad->persona->fecha_nacimiento->format('d') }}
                    de {{ $meses[intval($autoridad->persona->fecha_nacimiento->format('m'))] }}
                    del {{$autoridad->persona->fecha_nacimiento->format('Y')}}
                </p>
            </div>
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Género</h3>
                <p class="text-zinc-600">
                    {{ $autoridad->persona->sexo_id === 1 ? 'Femenino':'Masculino' }}
                </p>
            </div>
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Celular</h3>
                <p class="text-zinc-600">
                    {{ $autoridad->persona->celular }}
                </p>
            </div>
        </div>
        @if($distrito)
            <div class="col-span-2 space-y-6">
                <div
                    class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                    <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Departamento</h3>
                    <p class="text-zinc-600">
                        {{ $distrito->provincia->departamento }}
                    </p>
                </div>
                <div
                    class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                    <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Provincia</h3>
                    <p class="text-zinc-600">
                        {{ $distrito->provincia->nombre }}
                    </p>
                </div>
                <div
                    class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                    <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Distrito</h3>
                    <p class="text-zinc-600">
                        {{ $distrito->nombre }}
                    </p>
                </div>
            </div>
        @endif
        <div class="col-span-2 space-y-6">
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Cargo</h3>
                <p class="text-zinc-600">
                    {{ $autoridad_cargos[$autoridad->autoridad_cargo_id] }}
                </p>
                <x-jet-dropdown align="right" width="64">
                    <x-slot name="trigger">
                        <button type="button"
                                class="w-full  flex justify-between items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition">
                            {{ $autoridad_cargos[$autoridad->autoridad_cargo_id] }}
                            <svg class="ml-2 -mr-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                 viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd"
                                      d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                      clip-rule="evenodd"/>
                            </svg>
                        </button>
                    </x-slot>
                    <x-slot name="content">
                        @foreach($autoridad_cargos as $id=>$cargo)
                            <button class="btn btn-state-default w-full" wire:click="cambiarCargo({{ $autoridad->id }},{{ $id }})">
                                {{$cargo}}
                            </button>
                        @endforeach

                    </x-slot>
                </x-jet-dropdown>
            </div>
        </div>
    </div>
</div>
