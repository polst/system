<?php
/**
 * @package Basic App System
 * @link http://basic-app.com
 * @license MIT License
 */
if (!function_exists('app_view'))
{
    function app_view(string $name, array $data = [], array $options = [])
    {
        return BasicApp\Helpers\ViewHelper::render($name, $data, $options);
    }
}