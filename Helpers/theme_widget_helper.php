<?php

// DEPRECATED
// Use service('theme')->widget(string $name, array $params = []) function.

if (!function_exists('theme_widget'))
{
    function theme_widget(string $name, array $params = [])
    {
        $theme = service('theme');

        return $theme->widget($name, $params);
    }
}