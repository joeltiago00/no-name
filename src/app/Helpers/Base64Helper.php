<?php

namespace App\Helpers;

class Base64Helper
{
    public static function getType(string $base64): string
    {
        $pieces = explode('/', $base64);

        $pieces = explode(';', $pieces[1]);

        return $pieces[0];
    }
}
