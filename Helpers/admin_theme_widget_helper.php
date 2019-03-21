<?php

if (!function_exists('admin_theme_widget'))
{
    function admin_theme_widget(string $widget, array $params = [])
    {
        return PHPTheme::widget($widget, $params);
    }
}