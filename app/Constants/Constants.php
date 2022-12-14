<?php

namespace App\Constants;

class Constants
{
    public static $utimo_codigo_cid = "21.1.0124";
    public static $estudiante_id = 70;
    public static $ultimo_codigo_estudiante = "21.1.0124"; // Reinicable
    public static $docente_id = 5;
    public static $ultimo_codigo_docente = "22.2.024"; // Reiniciable

    public static function autoridad_cargos()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Director del Centro de Idiomas']),
            collect(['id' => 2, 'nombre' => 'Vicerrector Académico']),
        ]);
    }

    public static function ciclos()
    {
        return collect([
            // Ciclo Normal
            collect(['id' => 1, 'nombre' => 'I']),
            collect(['id' => 2, 'nombre' => 'II']),
            collect(['id' => 3, 'nombre' => 'III']),
            collect(['id' => 4, 'nombre' => 'IV']),
            collect(['id' => 5, 'nombre' => 'V']),
            collect(['id' => 6, 'nombre' => 'VI']),
            collect(['id' => 7, 'nombre' => 'VII']),
            collect(['id' => 8, 'nombre' => 'VIII']),
            collect(['id' => 9, 'nombre' => 'IX']),
            collect(['id' => 10, 'nombre' => 'X']),
            // Ciclo Acelerado
            collect(['id' => 11, 'nombre' => 'I y II']),
            collect(['id' => 12, 'nombre' => 'III y IV']),
            collect(['id' => 13, 'nombre' => 'V y VI']),
            collect(['id' => 14, 'nombre' => 'VII y VIII']),
            collect(['id' => 15, 'nombre' => 'IX y X']),
        ]);
    }

    public static function clase_modalidades()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Presenciales']),
            collect(['id' => 2, 'nombre' => 'Virtuales']),
        ]);
    }

    public static function dias()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Lunes']),
            collect(['id' => 2, 'nombre' => 'Martes']),
            collect(['id' => 3, 'nombre' => 'Miercoles']),
            collect(['id' => 4, 'nombre' => 'Jueves']),
            collect(['id' => 5, 'nombre' => 'Viernes']),
            collect(['id' => 6, 'nombre' => 'Sábado']),
            collect(['id' => 7, 'nombre' => 'Domingo']),
        ]);
    }

    public static function docente_categorias()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Auxiliar']),
            collect(['id' => 2, 'nombre' => 'Asociado']),
            collect(['id' => 3, 'nombre' => 'Principal']),
            collect(['id' => 4, 'nombre' => 'DC A1']),
            collect(['id' => 5, 'nombre' => 'DC A2']),
            collect(['id' => 6, 'nombre' => 'DC B1']),
            collect(['id' => 7, 'nombre' => 'DC B2']),
        ]);
    }

    public static function docente_condicion()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Contratado']),
            collect(['id' => 2, 'nombre' => 'Nombrado']),
        ]);
    }

    public static function docente_dedicacion()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Tiempo Completo']),
            collect(['id' => 2, 'nombre' => 'Tiempo Parcial']),
            collect(['id' => 3, 'nombre' => 'Dedicación Exclusiva']),
        ]);
    }

    public static function grados_academicos()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Bachiller']),
            collect(['id' => 2, 'nombre' => 'Titulado']),
            collect(['id' => 3, 'nombre' => 'Magister']),
            collect(['id' => 4, 'nombre' => 'Doctor'])
        ]);
    }

    public static function estudiante_tipos()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Normal']),
            collect(['id' => 2, 'nombre' => 'Tercio Superior'])
        ]);
    }

    public static function idioma_niveles()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Básico']),
            collect(['id' => 2, 'nombre' => 'Intermedio']),
            collect(['id' => 3, 'nombre' => 'Avanzado'])
        ]);
    }

    public static function idioma_subniveles()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'A1', 'idioma_nivel_id' => 1]),
            collect(['id' => 2, 'nombre' => 'A2', 'idioma_nivel_id' => 1]),
            collect(['id' => 3, 'nombre' => 'B1', 'idioma_nivel_id' => 2]),
            collect(['id' => 4, 'nombre' => 'B2', 'idioma_nivel_id' => 2]),
            collect(['id' => 5, 'nombre' => 'C1', 'idioma_nivel_id' => 3]),
            collect(['id' => 6, 'nombre' => 'C2', 'idioma_nivel_id' => 3])
        ]);
    }

    public static function institucion_ambitos()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Público']),
            collect(['id' => 2, 'nombre' => 'Privado']),
        ]);
    }

    public static function institucion_tipos()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Académico']),
            collect(['id' => 2, 'nombre' => 'Político']),
            collect(['id' => 3, 'nombre' => 'Económico']),
            collect(['id' => 4, 'nombre' => 'Militar']),
        ]);
    }

    public static function meses()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Enero']),
            collect(['id' => 2, 'nombre' => 'Febrero']),
            collect(['id' => 3, 'nombre' => 'Marzo']),
            collect(['id' => 4, 'nombre' => 'Abril']),
            collect(['id' => 5, 'nombre' => 'Mayo']),
            collect(['id' => 6, 'nombre' => 'Junio']),
            collect(['id' => 7, 'nombre' => 'Julio']),
            collect(['id' => 8, 'nombre' => 'Agosto']),
            collect(['id' => 9, 'nombre' => 'Septiembre']),
            collect(['id' => 10, 'nombre' => 'Octubre']),
            collect(['id' => 11, 'nombre' => 'Noviembre']),
            collect(['id' => 12, 'nombre' => 'Diciembre']),
        ]);
    }

    public static function pago_lugares()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Banco de la  Nación']),
            collect(['id' => 2, 'nombre' => 'Descuento por Planilla']),
            collect(['id' => 3, 'nombre' => 'Tesoreria de la Unasam']),
        ]);
    }

    public static function sexos()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'Femenino']),
            collect(['id' => 2, 'nombre' => 'Masculino']),
        ]);
    }

    public static function solicitud_estados()
    {
        return collect([
            collect(['id' => 1, 'nombre' => 'En evaluación']),
            collect(['id' => 2, 'nombre' => 'Denegado']),
            collect(['id' => 3, 'nombre' => 'Aprobado']),
            collect(['id' => 4, 'nombre' => 'Observado']),
        ]);
    }

}
