<?php

// DEPRECATED
// Use service('adminTheme')->widget(string $name, array $params = []) function

if (!function_exists('admin_theme_widget'))
{
    function admin_theme_widget(string $name, array $params = [])
    {
        $adminTheme = service('adminTheme');

        return $adminTheme->widget($name, $params);
    }
}