<?php

namespace App\Utilities;

class CommonUtils
{
    public static function arrayToLower($array)
    {
        $lowercasedArray = [];

        foreach ($array as $key => $value) {
            if ($value === null) {
                $lowercasedArray[mb_strtolower($key, 'UTF-8')] = null;
            }
            else {
                $lowercasedArray[mb_strtolower($key, 'UTF-8')] = mb_strtolower($value, 'UTF-8');
            }
        }

        return $lowercasedArray;
    }

    public static function removeArrayDiacritics($array)
    {
        $diacritics = [
            'á' => 'a',
            'à' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ü' => 'u',
            'ç' => 'c',
        ];

        $cleanedArray = [];

        foreach ($array as $key => $value) {
            $cleanedKey = strtr($key, $diacritics);
            if ($value === null) {
                $cleanedArray[$cleanedKey] = null;
            } 
            else {
                $cleanedValue = strtr($value, $diacritics);
                $cleanedArray[$cleanedKey] = $cleanedValue;
            }
        }

        return $cleanedArray;
    }
}