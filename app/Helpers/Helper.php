<?php

namespace App\Helpers;

class Helper
{
    //LETRAS MAIÚSCULAS
    public static function upperCase(string $string)
    {
        return strtoupper($string);
    }

    //LETRAS MINÚSCULAS
    public static function lowerCase(string $string)
    {
        return strtolower($string);
    }

    //FORMATAR DATA E HORA BRASIL
    public static function formatDatetimeBr(string $data)
    {
        return date("d/m/Y H:i", strtotime($data));
    }
}
