<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System;

use BasicApp\Core\Event;
use BasicApp\System\Events\SystemResetEvent;
use BasicApp\System\Events\SystemSeedEvent;

abstract class BaseSystemEvents extends \CodeIgniter\Events\Events
{

    const EVENT_DB_QUERY = 'DBQuery';

    const EVENT_PRE_SYSTEM = 'pre_system';

    const EVENT_UPDATE = 'ba:update';

    const EVENT_SEED = 'ba:seed';

    const EVENT_RESET = 'ba:reset';
    
    const EVENT_FILTERS = 'ba:filters';

    const EVENT_VIEW = 'ba:view';

    const EVENT_IMAGES = 'ba:images';

    const EVENT_VALIDATION = 'ba:validation';

    const EVENT_EMAIL = 'ba:email';

    const EVENT_USER_AGENTS = 'ba:user_agents';

    const EVENT_PAGER = 'ba:pager';

    public static function onPreSystem($callback)
    {
        static::on(static::EVENT_PRE_SYSTEM, $callback);
    }

    public static function onDbQuery($callback)
    {
        static::on(static::EVENT_DB_QUERY, $callback);
    }
    
    public static function onUserAgents($callback)
    {
        static::on(static::EVENT_USER_AGENTS, $callback);
    }

    public static function onUpdate($callback)
    {
        static::on(static::EVENT_UPDATE, $callback);
    }

    public static function onSeed($callback)
    {
        static::on(static::EVENT_SEED, $callback);
    }

    public static function onReset($callback)
    {
        static::on(static::EVENT_RESET, $callback);
    }

    public static function onFilters($callback)
    {
        static::on(static::EVENT_FILTERS, $callback);
    }

    public static function onView($callback)
    {
        static::on(static::EVENT_VIEW, $callback);
    }

    public static function onImages($callback)
    {
        static::on(static::EVENT_IMAGES, $callback);
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

    public static function update(array $params = [])
    {
        $event = new Event;

        if (array_search('reset', $params) !== false)
        {
            $event->reset = true;
        }
        else
        {
            $event->reset = false;
        }

        static::trigger(static::EVENT_UPDATE, $event);
    }

    public static function seed(array $params = [])
    {
        $event = new SystemSeedEvent;

        $event->params = $params;

        static::trigger(static::EVENT_SEED, $event);
    }

    public static function reset(array $params = [])
    {
        $event = new SystemResetEvent;

        $event->params = $params;

        static::trigger(static::EVENT_RESET, $event);
    }    

    public static function pager($pager)
    {
        static::trigger(static::EVENT_PAGER, $pager);
    }

    public static function validation($validation)
    {
        static::trigger(static::EVENT_VALIDATION, $validation);
    }

    public static function view($view)
    {
        static::trigger(static::EVENT_VIEW, $view);
    }

    public static function filters($filters)
    {
        static::trigger(static::EVENT_FILTERS, $filters);
    }

    public static function email($email)
    {
        static::trigger(static::EVENT_EMAIL, $email);
    }

    public static function userAgents($userAgents)
    {
        static::trigger(static::EVENT_USER_AGENTS, $userAgents);
    }

    public static function images($images)
    {
        static::trigger(static::EVENT_IMAGES, $images);
    }
       
}