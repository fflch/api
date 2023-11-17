<?php

namespace App\Utilities;

use Illuminate\Support\Str;

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

    public static function generateRandomToken(int $size = 32)
    {
        $combinedString = Str::random(32) . now()->timestamp;
        $token = hash('sha256', $combinedString);

        return substr($token, 0, $size);
    }

    public static function hashValue($value, $len)
    {
        $pepper = strrev($_ENV['API_HASH_PEPPER']);
        $stringValue = strrev((string)$value);

        $valueLen = strlen($stringValue);
        $pepperLen = strlen($pepper);
        $maxLen = max($valueLen, $pepperLen);

        $combinedString = "";

        for($i = 0; $i < $maxLen; $i++) {
            if ($i < $valueLen) {
                $combinedString .= $stringValue[$i] . "-";
            }
            if ($i < $pepperLen) {
                $combinedString .= $pepper[$i] . "-";
            }
        }

        $hash = (hash('sha256', $combinedString));

        return strtoupper(substr($hash, 0, $len));
    }
}