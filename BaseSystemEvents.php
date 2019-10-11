<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System;

use BasicApp\Core\Event;

abstract class BaseSystemEvents extends \CodeIgniter\Events\Events
{

    const EVENT_UPDATE = 'ba:update';

    const EVENT_SEEDER = 'ba:seeder';

    const EVENT_THEME_LIST = 'ba:theme_list';

    public static function update()
    {
        static::trigger(static::EVENT_UPDATE);
    }

    public static function onUpdate($callback)
    {
        static::on(static::EVENT_UPDATE, $callback);
    }

    public static function seeder()
    {
        static::trigger(static::EVENT_SEEDER);
    }

    public static function onSeeder($callback)
    {
        static::on(static::EVENT_SEEDER, $callback);
    }

    public static function themeList($return = [])
    {
        $event = new Event;

        $event->result = $return;

        static::trigger(static::EVENT_THEME_LIST, $event);

        return $event->result;
    }

    public static function onThemeList($callback)
    {
        static::on(static::EVENT_THEME_LIST, $callback);
    }

}