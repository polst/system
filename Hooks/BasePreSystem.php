<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Hooks;

abstract class BasePreSystem
{

    public static function run()
    {
        helper([
            'app_view', 
            'app_url', 
            'get_value', 
            'classic_url', 
            'message',
            'theme_widget',
            'admin_theme_widget'
        ]);
    }

}