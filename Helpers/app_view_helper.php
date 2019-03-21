<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
if (!function_exists('app_view'))
{
    function app_view(string $name, array $data = [], array $options = [])
    {
        $filename = APPPATH . 'Views/' . str_replace('\\', '/', $name) . '.php';

        if (is_file($filename))
        {
            $name = 'App\\' . $name;
        }

        return view($name, $data, $options);
    }
}
