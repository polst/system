<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Components;

abstract class BaseEvents extends \BasicApp\Core\Events
{

    const EVENT_ADMIN_MAIN_MENU = 'admin_main_menu';

    const EVENT_ADMIN_OPTIONS_MENU = 'admin_options_menu';

    public static function adminMainMenu($callback)
    {
        static::on(static::EVENT_ADMIN_MAIN_MENU, $callback);
    }

    public static function adminOptionsMenu($callback)
    {
        static::on(static::EVENT_ADMIN_OPTIONS_MENU, $callback);
    }

}