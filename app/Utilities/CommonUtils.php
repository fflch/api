<?php

namespace App\Utilities;

use Illuminate\Support\Str;

class CommonUtils
{
    public static function arrayToLower($array)
    {
        $lowercasedArray = [];

        foreach ($array as $key => $value) {
            $lowercasedKey = mb_strtolower($key);

            if (is_array($value)) {
                $lowercasedValue = self::arrayToLower($value);
            } else {
                $lowercasedValue = mb_strtolower($value);
            }

            $lowercasedArray[$lowercasedKey] = $lowercasedValue;
        }

        return $lowercasedArray;
    }

    public static function removeArrayDiacritics($array)
    {
        $cleanArray = [];

        foreach ($array as $key => $value) {
            $cleanKey = self::removeStringDiacritics($key);

            if (is_array($value)) {
                $cleanValue = self::removeArrayDiacritics($value);
            } else {
                $cleanValue = self::removeStringDiacritics($value);
            }

            $cleanArray[$cleanKey] = $cleanValue;
        }

        return $cleanArray;
    }

    private static function removeStringDiacritics($value)
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

        return strtr($value, $diacritics);
    }
    public static function generateRandomToken(int $size = 32)
    {
        $combinedString = Str::random(32) . now()->timestamp;
        $token = hash('sha256', $combinedString);

        return substr($token, 0, $size);
    }

    public static function hashValue($value, int $len = 24)
    {
        $pepper = strrev($_ENV['API_HASH_PEPPER']);
        $stringValue = strrev((string)$value);

        $valueLen = strlen($stringValue);
        $pepperLen = strlen($pepper);
        $maxLen = max($valueLen, $pepperLen);

        $combinedString = "";

        for ($i = 0; $i < $maxLen; $i++) {
            if ($i < $valueLen) {
                $combinedString .= $stringValue[$i] . "-";
            }
            if ($i < $pepperLen) {
                $combinedString .= $pepper[$i] . "-";
            }
        }

        $hash = hash('sha256', $combinedString);

        return strtoupper(substr($hash, 0, $len));
    }

    public static function isArrayOrObject($input)
    {
        return is_array($input) || is_object($input);
    }

    public static function isMultidimensional($input)
    {
        if (is_array($input)) {
            return count($input) !== count($input, COUNT_RECURSIVE);
        } elseif (is_object($input)) {
            foreach ($input as $property) {
                if (is_array($property) || is_object($property)) {
                    return true;
                }
            }
            return false;
        } else {
            return false;
        }
    }

    public static function validateNestedArrayKey(
        array $nestedKeysSequence,
        array $targetArray
    ) {
        $currentArray = $targetArray;
        foreach ($nestedKeysSequence as $nestedKey) {
            if (!isset($currentArray[$nestedKey])) {
                return false;
            }
            $currentArray = $currentArray[$nestedKey];
        }

        return true;
    }
}
