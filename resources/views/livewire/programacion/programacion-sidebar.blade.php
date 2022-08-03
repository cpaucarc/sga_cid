<div class="flex flex-col items-start gap-y-6 divide-slate-200 divide-y">
    <x-sidebar.group>
        <x-app.programacion.sidebar-link href="{{ route('programacion.prematricula') }}"
                                         :active="request()->routeIs('programacion.prematricula')">
            @slot('icon')
                <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                </svg>
            @endslot
            Prematrícula
            @slot('fechas')
                @if($prematricula)
                    {{$prematricula->fecha_inicio->format('d')}}
                    de {{$meses[intval($prematricula->fecha_inicio->format('m'))]}} -
                    {{$prematricula->fecha_fin->format('d')}}
                    de {{$meses[intval($prematricula->fecha_fin->format('m'))]}}
                @else
                    Aun no hay fecha programadas
                @endif
            @endslot
        </x-app.programacion.sidebar-link>

        <x-app.programacion.sidebar-link href="{{ route('programacion.matricula') }}"
                                         :active="request()->routeIs('programacion.matricula')">
            @slot('icon')
                <svg class="ic" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path d="M12 14l9-5-9-5-9 5 9 5z"/>
                    <path
                        d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z"/>
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M12 14l9-5-9-5-9 5 9 5zm0 0l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14zm-4 6v-7.5l4-2.222"/>
                </svg>
            @endslot
            Matrícula
            @slot('fechas')
                @if($matricula)
                    {{$matricula->fecha_inicio->format('d')}}
                    de {{$meses[intval($matricula->fecha_inicio->format('m'))]}} -
                    {{$matricula->fecha_fin->format('d')}}
                    de {{$meses[intval($matricula->fecha_fin->format('m'))]}}
                @else
                    Aun no hay fecha programadas
                @endif
            @endslot
        </x-app.programacion.sidebar-link>
    </x-sidebar.group>

    <x-sidebar.group class="pt-4">
        <x-app.programacion.sidebar-link href="{{ route('programacion.pago') }}" :active="request()->routeIs('programacion.pago')">
            @slot('icon')
                <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"/>
                </svg>
            @endslot
            Pagos
            @slot('fechas')
                @if($pagos)
                    {{$pagos->fecha_inicio_pago->format('d')}}
                    de {{$meses[intval($pagos->fecha_inicio_pago->format('m'))]}} -
                    {{$pagos->fecha_fin_pago->format('d')}}
                    de {{$meses[intval($pagos->fecha_fin_pago->format('m'))]}}
                @else
                    Aun no hay fecha programadas
                @endif
            @endslot
        </x-app.programacion.sidebar-link>
    </x-sidebar.group>

</div>
