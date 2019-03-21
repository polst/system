<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
if (!function_exists('array_value'))
{
    function array_value(array $array, $value, $default = null)
    {
        if (array_key_exists($value, $array))
        {
            return $array[$value];
        }

        return $default;
    }
}