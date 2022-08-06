<?php

namespace App\Lib;

class MatriculaUtil
{

    public static function calcularGrupos($prematriculados, $min, $rec, $max)
    {
        // Si los prematriculados es menor al minimo requerido por curso, no crear ningun grupo
        if ($prematriculados < $min)
            return 0;

        // Si los prematriculados está hasta el aforo maximo permitido, crear un solo grupo
        if ($prematriculados <= $max)
            return 1;

        return intval($prematriculados / $rec) + (($prematriculados % $rec) > 0 ? 1 : 0);
    }

}
