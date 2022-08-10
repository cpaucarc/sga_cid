@props(['mensual', 'meses', 'clase_modalidades'])

@if($mensual)
    <section class="border border-gray-1 rounded bg-white">
        <div class="px-4 py-4">
            <div class="space-y-1">
                <h2 class="font-bold text-lg {{ $mensual->esta_activo ? 'text-blue-3' : 'text-gray-4' }}">
                    {{ $meses[$mensual->mes_id] }} de {{ $mensual->anio }}
                </h2>

                @if(!$mensual->esta_activo)
                    <a class="text-blue-3 hover:underline soft-transition text-sm text-right"
                       href="{{ route('director.matricula.programacion.index') }}">
                        Ir al mes actual
                    </a>
                @endif
            </div>
            <p class="text-xs text-gray-3 font-normal mt-1">
                Clases <b>{{ $clase_modalidades[$mensual->clase_modalidad_id] }}</b> desde
                el {{ $mensual->inicio_clases->format('d') }}
                de {{$meses[intval( $mensual->inicio_clases->format('m'))] }} hasta
                el {{ $mensual->fin_clases->format('d') }}
                de {{ $meses[intval($mensual->fin_clases->format('m'))] }}
            </p>
        </div>

        <hr class="border-t border-gray-1">

        <div class="space-y-1">
            <a class="bg-transparent hover:bg-gray-1/30 soft-transition flex flex-col px-4 py-3 group"
               href="{{ route('director.matricula.prematricula.index', ['year' => $mensual->anio, 'month' => $mensual->mes_id]) }}">
                <div
                    class="flex justify-between text-gray-3 group-hover:text-blue-3 group-hover:underline underline-offset-2 soft-transition">
                    <h3 class="font-semibold">Pre-matrícula</h3>
                </div>
                <p class="text-xs text-gray-3">
                    @if($mensual->inicio_prematricula && $mensual->fin_prematricula)
                        {{$mensual->inicio_prematricula->format('d')}}
                        de {{$meses[intval($mensual->inicio_prematricula->format('m'))]}} -
                        {{$mensual->fin_prematricula->format('d')}}
                        de {{$meses[intval($mensual->fin_prematricula->format('m'))]}}
                    @else
                        Aun no hay fecha programadas
                    @endif
                </p>
            </a>

            <a class="bg-transparent hover:bg-gray-1/30 soft-transition flex flex-col px-4 py-3 group"
               href="#">
                <div
                    class="flex justify-between text-gray-3 group-hover:text-blue-3 group-hover:underline underline-offset-2 soft-transition">
                    <h3 class="font-semibold">Matrícula</h3>
                </div>
                <p class="text-xs text-gray-3">
                    @if($mensual->inicio_matricula && $mensual->fin_matricula)
                        {{$mensual->inicio_matricula->format('d')}}
                        de {{$meses[intval($mensual->inicio_matricula->format('m'))]}} -
                        {{$mensual->fin_matricula->format('d')}}
                        de {{$meses[intval($mensual->fin_matricula->format('m'))]}}
                    @else
                        Aun no hay fecha programadas
                    @endif
                </p>
            </a>

            <a class="bg-transparent hover:bg-gray-1/30 soft-transition flex flex-col px-4 py-3 group"
               href="#">
                <div
                    class="flex justify-between text-gray-3 group-hover:text-blue-3 group-hover:underline underline-offset-2 soft-transition">
                    <h3 class="font-semibold">Pagos</h3>
                </div>
                <ol class="list-disc list-inside space-y-2 mt-2">
                    <li class="text-sm text-gray-3">
                        @if($mensual->inicio_pago && $mensual->fin_pago)
                            <b>Estudiantes</b>
                            <p class="block ml-5 text-xs">
                                {{$mensual->inicio_pago->format('d')}}
                                de {{$meses[intval($mensual->inicio_pago->format('m'))]}} -
                                {{$mensual->fin_pago->format('d')}}
                                de {{$meses[intval($mensual->fin_pago->format('m'))]}}
                            </p>
                        @else
                            Aun no hay fechas programadas
                        @endif
                    </li>
                    <li class="text-sm text-gray-3">
                        @if($mensual->inicio_revision && $mensual->fin_revision)
                            <b>Revisión</b>
                            <p class="block ml-5 text-xs">
                                {{$mensual->inicio_revision->format('d')}}
                                de {{$meses[intval($mensual->inicio_revision->format('m'))]}} -
                                {{$mensual->fin_revision->format('d')}}
                                de {{$meses[intval($mensual->fin_revision->format('m'))]}}
                            </p>
                        @else
                            Aun no hay fechas programadas
                        @endif
                    </li>
                    <li class="text-sm text-gray-3">
                        @if($mensual->inicio_validacion && $mensual->fin_validacion)
                            <b>Validación</b>
                            <p class="block ml-5 text-xs">
                                {{$mensual->inicio_validacion->format('d')}}
                                de {{$meses[intval($mensual->inicio_validacion->format('m'))]}} -
                                {{$mensual->fin_validacion->format('d')}}
                                de {{$meses[intval($mensual->fin_validacion->format('m'))]}}
                            </p>
                        @else
                            Aun no hay fechas programadas
                        @endif
                    </li>
                </ol>
            </a>
        </div>
    </section>
@endif
