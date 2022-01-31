<?php

namespace Store\Helper;

class ConverteMoeda
{
    public static function paraReal(float $valor): string
    {
        return number_format($valor, 2, ',', '.');
    }
}