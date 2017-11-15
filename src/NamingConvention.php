<?php
namespace NamingConvention;

class NamingConvention
{
    public static function isCamelCase($str)
    {
        return ctype_alpha($str);
    }

    public static function isUpperCamelCase($str)
    {
        if (!ctype_upper(substr($str, 0 ,1))) {
            return false;
        } elseif (!ctype_alpha($str)) {
            return false;
        }
        return true;
    }

    public static function isLowerCamelCase($str)
    {
        if (!ctype_lower(substr($str, 0 ,1))) {
            return false;
        } elseif (!ctype_alpha($str)) {
            return false;
        }
        return true;
    }

    public static function isSnakeCase($str)
    {
        $str = str_replace('_', '', $str);
        return ctype_lower($str);
    }

    public static function snakeCaseToCamelCase($str)
    {
        $camelCase = self::snakeCaseToCamelCaseFirstUpper($str);
        return lcfirst($camelCase);
    }

    public static function snakeCaseToCamelCaseFirstUpper($str)
    {
        $parts = explode('_', $str);
        foreach ($parts as $part) {
            $camelCase .= ucfirst($part);
        }
        return $camelCase;
    }

    public static function camelCaseToSnakeCase($str)
    {
        $parts = self::splitAtUpperCase($str);
        $lastIndex = count($parts) - 1;
        $index = 0;
        $snakeCase = '';
        foreach ($parts as $part) {
            $snakeCase .= strtolower($part);
            if ($lastIndex != $index++) {
                $snakeCase .= '_';
            }
        }
        return $snakeCase;
    }

    public static function splitAtUpperCase($str) {
        return preg_split('/(?=[A-Z])/', $str, -1, PREG_SPLIT_NO_EMPTY);
    }
}
