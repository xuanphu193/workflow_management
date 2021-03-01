<?php

namespace App\Helpers;

class Helper
{
    public static function formatDate(string $date, $format)
    {
        $date = date_create($date);
        return date_format($date, $format);
    }
}