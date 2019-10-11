<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
if (!function_exists('app_view'))
{
    function app_view(string $name, array $data = [], array $options = [])
    {
        return BasicApp\Helpers\ViewHelper::render($name, $data, $options);
    }
}