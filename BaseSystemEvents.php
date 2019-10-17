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

    const EVENT_PRE_SYSTEM = 'pre_system';

    const EVENT_UPDATE = 'ba:update';

    const EVENT_SEED = 'ba:seed';

    const EVENT_THEMES = 'ba:themes';

    const EVENT_FILTERS = 'ba:filters';

    const EVENT_VIEW = 'ba:view';

    const EVENT_VALIDATION = 'ba:validation';

    const EVENT_PAGER = 'ba:pager';

    const EVENT_EMAIL = 'ba:email';

    // CodeIgniter Events

    public static function onPreSystem($callback)
    {
        static::on(static::EVENT_PRE_SYSTEM, $callback);
    }

    // Basic App Events

    public static function onUpdate($callback)
    {
        static::on(static::EVENT_UPDATE, $callback);
    }

    public static function onSeeder($callback)
    {
        static::on(static::EVENT_SEEDER, $callback);
    }

    public static function onThemes($callback)
    {
        static::on(static::EVENT_THEMES, $callback);
    }

    public static function onFilters($callback)
    {
        static::on(static::EVENT_FILTERS, $callback);
    }

    public static function onView($callback)
    {
        static::on(static::EVENT_VIEW, $callback);
    }

    public static function onValidation($callback)
    {
        static::on(static::EVENT_VALIDATION, $callback);
    }

    public static function onPager($callback)
    {
        static::on(static::EVENT_PAGER, $callback);
    }

    public static function onEmail($callback)
    {
        static::on(static::EVENT_EMAIL, $callback);
    }

    //

    public static function update()
    {
        static::trigger(static::EVENT_UPDATE);
    }

    public static function seed()
    {
        static::trigger(static::EVENT_SEED);
    }

    public static function pager($config)
    {
        $event = new Event;

        $event->config = $config;

        static::trigger(static::EVENT_PAGER, $event);
    }

    public static function validation($config)
    {
        $event = new Event;

        $event->config = $config;

        static::trigger(static::EVENT_VALIDATION, $event);
    }

    public static function view($config)
    {
        $event = new Event;

        $event->config = $config;

        static::trigger(static::EVENT_VIEW, $event);
    }

    public static function filters($config)
    {
        $event = new Event;

        $event->config = $config;

        static::trigger(static::EVENT_FILTERS, $event);
    }

    public static function themes($return = [])
    {
        $event = new Event;

        $event->result = $return;

        static::trigger(static::EVENT_THEMES, $event);

        return $event->result;
    }

    public static function email($config)
    {
        $event = new Event;

        $event->config = $config;

        static::trigger(static::EVENT_EMAIL, $event);
    }

}