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

    const EVENT_DB_QUERY = 'DBQuery';

    const EVENT_PRE_SYSTEM = 'pre_system';

    const EVENT_UPDATE = 'ba:update';

    const EVENT_SEED = 'ba:seed';

    const EVENT_THEMES = 'ba:themes';
    
    const EVENT_FILTERS = 'ba:filters';

    const EVENT_VIEW = 'ba:view';

    const EVENT_VALIDATION = 'ba:validation';

    const EVENT_PAGER = 'ba:pager';

    const EVENT_EMAIL = 'ba:email';

    const EVENT_USER_AGENTS = 'ba:user_agents';

    const EVENT_CONTROLLER = 'ba:controller';

    const EVENT_REGISTER_ASSETS = 'ba:controller';

    const EVENT_USER_MENU = 'ba:user_menu';

    const EVENT_ACCOUNT_MENU = 'ba:account_menu';

    public static function onUserMenu($callback)
    {
        static::on(static::EVENT_USER_MENU, $callback);
    }

    public static function onAccountMenu($callback)
    {
        static::on(static::EVENT_ACCOUNT_MENU, $callback);
    }

    public static function onRegisterAssets($callback)
    {
        static::on(static::EVENT_REGISTER_ASSETS, $callback);
    }

    public static function onPreSystem($callback)
    {
        static::on(static::EVENT_PRE_SYSTEM, $callback);
    }

    public static function onDbQuery($callback)
    {
        static::on(static::EVENT_DB_QUERY, $callback);
    }

    public static function onController($callback)
    {
        static::on(static::EVENT_CONTROLLER, $callback);
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
        $event = new Event;

        if (array_search('reset', $params) !== false)
        {
            $event->reset = true;
        }
        else
        {
            $event->reset = false;
        }

        static::trigger(static::EVENT_SEED, $event);
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

    public static function themes($return = [])
    {
        $event = new Event;

        $event->result = $return;

        static::trigger(static::EVENT_THEMES, $event);

        return $event->result;
    }

    public static function email($email)
    {
        static::trigger(static::EVENT_EMAIL, $email);
    }

    public static function userAgents($userAgents)
    {
        static::trigger(static::EVENT_USER_AGENTS, $userAgents);
    }

    public static function controller($controller)
    {
        static::trigger(static::EVENT_CONTROLLER, $controller);
    }

    public static function registerAssets(&$head, &$beginBody, &$endBody)
    {
        $event = new Event;

        $event->head = $head;

        $event->beginBody = $beginBody;

        $event->endBody = $endBody;

        static::trigger(static::EVENT_REGISTER_ASSETS, $event);

        $head = $event->head;

        $beginBody = $event->beginBody;

        $endBody = $event->endBody;
    }

    public static function userMenu()
    {
        $event = new Event;

        $event->items = [];

        static::trigger(static::EVENT_USER_MENU, $event);

        $view = service('renderer');

        $data = $view->getData();

        if (array_key_exists('userMenu', $data))
        {
            return array_merge_recursive($event->items, $data['userMenu']);
        }

        return $event->items;
    }

    public static function accountMenu()
    {
        $event = new Event;

        $event->items = [];

        static::trigger(static::EVENT_ACCOUNT_MENU, $event);

        $view = service('renderer');

        $data = $view->getData();

        if (array_key_exists('accountMenu', $data))
        {
            return array_merge_recursive($event->items, $data['accountMenu']);
        }

        return $event->items;
    }
       
}