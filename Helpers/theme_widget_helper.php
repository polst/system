<?php

if (!function_exists('theme_widget'))
{
    function theme_widget(string $widget, array $params = [])
    {
        return PHPTheme::widget($widget, $params);
    }
}