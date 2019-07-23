<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System;

use BasicApp\Core\Event;

abstract class BaseSystemEvents extends \CodeIgniter\Events\Events
{

    const EVENT_INSTALL = 'install';

    const EVENT_SEEDER = 'seeder';

    const EVENT_THEMES = 'themes';

    public static function install()
    {
        static::trigger(static::EVENT_INSTALL);
    }

    public static function onInstall($callback)
    {
        static::on(static::EVENT_INSTALL, $callback);
    }   

    public static function themes($return = [])
    {
        $event = new Event;

        $event->return = $return;

        static::trigger(static::EVENT_THEMES, $event);

        return $event->return;
    }

    public static function onThemes($callback)
    {
        static::on(static::EVENT_THEMES, $callback);
    } 

    public static function seeder()
    {
        static::trigger(static::EVENT_SEEDER);
    }

    public static function onSeeder($callback)
    {
        static::on(static::EVENT_SEEDER, $callback);
    }

}