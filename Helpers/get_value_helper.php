<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
if (!function_exists('get_value'))
{
    function get_value($array, $value, $default = null)
    {
        if (is_object($array))
        {
            if (property_exists($array, $value))
            {
                return $array->$value;
            }

            return $default;
        }

        if (array_key_exists($value, $array))
        {
            return $array[$value];
        }

        return $default;
    }
}