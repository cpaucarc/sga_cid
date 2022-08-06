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
                Codigo {{ $docente->codigo }}
            </h4>
            <h3 class="text-2xl text-black font-bold">
                {{$docente->persona->apellido_paterno}} {{$docente->persona->apellido_materno}} {{$docente->persona->nombres}}
                <span
                    class="bg-red-100 text-red-800 text-sm font-medium ml-2 px-2.5 py-0.5 rounded dark:bg-red-200 dark:text-red-900">{{$pais->nombre}}</span>
            </h3>
            @if(!$docente->esta_activo)
                <p class="text-sm flex items-center text-red-600">
                    <x-icons.warning class="h-5 w-5 mr-1 text-red-500"/>
                    Actualmente este docente está inactivo.
                </p>
            @endif
            <a class="flex items-center text-sm text-gray-600 tracking-wide hover:underline"
               href="mailto:{{$docente->persona->correo}}">
                <svg class="icon-5 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                </svg>
                {{$docente->persona->correo}}
            </a>
        </div>
        <div class="col-span-1">
            <x-jet-secondary-button wire:click="cambiarEstado({{ $docente->id }},{{$docente->esta_activo}})"
                                    class="text-sm {{ $docente->esta_activo ? 'btn-state-danger' :'btn-state-default'}}">
                <svg class="mr-1" fill="currentColor" viewBox="0 0 16 16" width="16" height="16">
                    <path fill-rule="evenodd"
                          d="M3.72 3.72a.75.75 0 011.06 0L8 6.94l3.22-3.22a.75.75 0 111.06 1.06L9.06 8l3.22 3.22a.75.75 0 11-1.06 1.06L8 9.06l-3.22 3.22a.75.75 0 01-1.06-1.06L6.94 8 3.72 4.78a.75.75 0 010-1.06z"></path>
                </svg>
                {{ $docente->esta_activo ? "Desactivar" : "Activar" }}
            </x-jet-secondary-button>
        </div>
    </div>

    <div class="grid grid-cols-6 gap-6 pt-6">
        <div class="col-span-2 space-y-6">
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Dni</h3>
                <p class="text-zinc-600">
                    {{ $docente->persona->dni }}
                </p>
            </div>
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Fecha de
                    nacimiento</h3>
                <p class="text-zinc-600">
                    {{ $docente->persona->fecha_nacimiento->format('d') }}
                    de {{ $meses[intval($docente->persona->fecha_nacimiento->format('m'))] }}
                    del {{$docente->persona->fecha_nacimiento->format('Y')}}
                </p>
            </div>
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Género</h3>
                <p class="text-zinc-600">
                    {{ $docente->persona->sexo_id === 1 ? 'Femenino':'Masculino' }}
                </p>
            </div>
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Celular</h3>
                <p class="text-zinc-600">
                    {{ $docente->persona->celular }}
                </p>
            </div>
        </div>
        <div class="col-span-2 space-y-6">
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Condición</h3>
                <p class="text-zinc-600">
                    {{ $condicion[$docente->docente_condicion_id]}}
                </p>
            </div>
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Categoria</h3>
                <p class="text-zinc-600">
                    {{ $categoria[$docente->docente_categoria_id]}}
                </p>
            </div>
            <div
                class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Decicación</h3>
                <p class="text-zinc-600">
                    {{ $dedicacion[$docente->docente_dedicacion_id]}}
                </p>
            </div>
        </div>
        @if($distrito)
            <div class="col-span-2 space-y-6">
                <div
                    class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                    <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Departamento</h3>
                    <p class="text-zinc-600">
                        {{ $departamento->nombre }}
                    </p>
                </div>
                <div
                    class="group space-y-1 bg-slate-50 hover:bg-slate-400/10 soft-transition p-2 rounded cursor-pointer">
                    <h3 class="font-bold text-zinc-400 group-hover:text-zinc-600 soft-transition">Provincia</h3>
                    <p class="text-zinc-600">
                        {{ $provincia->nombre }}
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
    </div>
</div>
