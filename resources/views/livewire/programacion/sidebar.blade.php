<div class="space-y-4 divide-slate-200 divide-y divide-dashed">

    @if($mensual)
        <h1 class="text-lg font-bold text-center w-full">
            {{ $meses[$mensual->mes_id] }} de {{ $mensual->anio }}
            <p class="text-sm text-slate-600 font-normal">
                Clases desde {{ $mensual->inicio_clases->format('d') }}
                de {{$meses[intval( $mensual->inicio_clases->format('m'))] }}
                hasta {{ $mensual->fin_clases->format('d') }}
                de {{ $meses[intval($mensual->fin_clases->format('m'))] }}
            </p>
        </h1>
    @else
        <h1 class="text-lg font-bold text-center w-full">
            No hay ningún mes registrado
        </h1>
    @endif

    @if($mensual)

        <x-sidebar.group>
            <x-app.programacion.sidebar-link href="#">
                @slot('icon')
                    <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"/>
                    </svg>
                @endslot
                Prematrícula
                @slot('fechas')
                    @if($mensual->inicio_prematricula && $mensual->fin_prematricula)
                        {{$mensual->inicio_prematricula->format('d')}}
                        de {{$meses[intval($mensual->inicio_prematricula->format('m'))]}} -
                        {{$mensual->fin_prematricula->format('d')}}
                        de {{$meses[intval($mensual->fin_prematricula->format('m'))]}}
                    @else
                        Aun no hay fecha programadas
                    @endif
                @endslot
            </x-app.programacion.sidebar-link>

            <x-app.programacion.sidebar-link href="#">
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
                    @if($mensual->inicio_matricula && $mensual->fin_matricula)
                        {{$mensual->inicio_matricula->format('d')}}
                        de {{$meses[intval($mensual->inicio_matricula->format('m'))]}} -
                        {{$mensual->fin_matricula->format('d')}}
                        de {{$meses[intval($mensual->fin_matricula->format('m'))]}}
                    @else
                        Aun no hay fecha programadas
                    @endif
                @endslot
            </x-app.programacion.sidebar-link>
        </x-sidebar.group>

        <x-sidebar.group class="pt-4">
            <x-app.programacion.sidebar-link href="#">
                @slot('icon')
                    <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                @endslot
                Pagos de estudiantes
                @slot('fechas')
                    @if($mensual->inicio_pago && $mensual->fin_pago)
                        {{$mensual->inicio_pago->format('d')}}
                        de {{$meses[intval($mensual->inicio_pago->format('m'))]}} -
                        {{$mensual->fin_pago->format('d')}}
                        de {{$meses[intval($mensual->fin_pago->format('m'))]}}
                    @else
                        Aun no hay fecha programadas
                    @endif
                @endslot
            </x-app.programacion.sidebar-link>

            <x-app.programacion.sidebar-link href="#">
                @slot('icon')
                    <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                    </svg>
                @endslot
                Revisión de Pagos
                @slot('fechas')
                    @if($mensual->inicio_revision && $mensual->fin_revision)
                        {{$mensual->inicio_revision->format('d')}}
                        de {{$meses[intval($mensual->inicio_revision->format('m'))]}} -
                        {{$mensual->fin_revision->format('d')}}
                        de {{$meses[intval($mensual->fin_revision->format('m'))]}}
                    @else
                        Aun no hay fecha programadas
                    @endif
                @endslot
            </x-app.programacion.sidebar-link>

            <x-app.programacion.sidebar-link href="#">
                @slot('icon')
                    <svg class="icon-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                              d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                @endslot
                Validación de Pagos
                @slot('fechas')
                    @if($mensual->inicio_validacion && $mensual->fin_validacion)
                        {{$mensual->inicio_validacion->format('d')}}
                        de {{$meses[intval($mensual->inicio_validacion->format('m'))]}} -
                        {{$mensual->fin_validacion->format('d')}}
                        de {{$meses[intval($mensual->fin_validacion->format('m'))]}}
                    @else
                        Aun no hay fecha programadas
                    @endif
                @endslot
            </x-app.programacion.sidebar-link>
        </x-sidebar.group>
    @endif
</div>
