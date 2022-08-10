<div>
    <div class="flex justify-between gap-x-6 items-center">
        <div class="space-y-2 flex-1">
            <h4 class="flex items-center text-sm text-gray-3 font-semibold tracking-wide">
                <x-icons.dni class="icon-5 mr-1"/>
                Codigo {{ $docente->codigo }}
            </h4>
            <h3 class="text-xl text-gray-4 font-bold uppercase">
                {{$docente->persona->apellido_paterno}} {{$docente->persona->apellido_materno}} {{$docente->persona->nombres}}
                <span
                    class="bg-rose-3/10 text-rose-3 text-sm font-medium ml-2 px-2.5 py-1 rounded">{{$docente->persona->pais}}</span>
            </h3>
            <a class="flex items-center text-sm text-gray-3 tracking-wide hover:underline"
               href="mailto:{{$docente->persona->correo}}">
                <x-icons.mail class="icon-5 mr-1"/>
                {{$docente->persona->correo}}
            </a>
            @if(!$docente->esta_activo)
                <p class="text-sm flex items-center text-rose-3">
                    <x-icons.warning class="icon-5 mr-1"/>
                    Actualmente este docente está inactivo.
                </p>
            @endif
        </div>

        @if($docente->esta_activo)
            <x-jet-button color="danger"
                          wire:click="cambiarEstado({{ $docente->id }},{{$docente->esta_activo}})">
                <x-icons.x class="icon-5 mr-2"/>
                Inhabilitar
            </x-jet-button>
        @else
            <x-jet-button color="primary"
                          wire:click="cambiarEstado({{ $docente->id }},{{$docente->esta_activo}})">
                <x-icons.check class="icon-5 mr-2"/>
                Habilitar
            </x-jet-button>
        @endif
    </div>

    <hr class="border-t border-dashed border-gray-1 mt-2"/>

    <div class="grid grid-cols-6 gap-6 pt-6">
        <div class="col-span-2 space-y-6">
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">DNI</h3>
                <p class="text-gray-3">
                    {{ $docente->persona->dni }}
                </p>
            </div>
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Fecha de nacimiento</h3>
                <p class="text-gray-3">
                    {{ $docente->persona->fecha_nacimiento->format('d') }}
                    de {{ $meses[intval($docente->persona->fecha_nacimiento->format('m'))] }}
                    del {{$docente->persona->fecha_nacimiento->format('Y')}}
                </p>
            </div>
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Género</h3>
                <p class="text-gray-3">
                    {{ $docente->persona->sexo_id === 1 ? 'Femenino':'Masculino' }}
                </p>
            </div>
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Celular</h3>
                <p class="text-gray-3">
                    {{ $docente->persona->celular }}
                </p>
            </div>
        </div>
        <div class="col-span-2 space-y-6">
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Condición</h3>
                <p class="text-gray-3">
                    {{ $condicion[$docente->docente_condicion_id]}}
                </p>
            </div>
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Categoria</h3>
                <p class="text-gray-3">
                    {{ $categoria[$docente->docente_categoria_id]}}
                </p>
            </div>
            <div class="group bg-gray-1/10 hover:bg-gray-1/25 hover:shadow soft-transition p-3 rounded">
                <h3 class="font-bold text-gray-3 group-hover:text-gray-4 soft-transition">Decicación</h3>
                <p class="text-gray-3">
                    {{ $dedicacion[$docente->docente_dedicacion_id]}}
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
    </div>
</div>
