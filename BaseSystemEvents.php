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

    const EVENT_SEEDER = 'ba:seeder';

    const EVENT_THEME_LIST = 'ba:theme_list';

    const EVENT_FILTERS_CONFIG = 'ba:filters_config';

    const EVENT_VIEW_CONFIG = 'ba:view_config';

    const EVENT_VALIDATION_CONFIG = 'ba:validation_config';

    const EVENT_PAGER_CONFIG = 'ba:validation_config';

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

    public static function onThemeList($callback)
    {
        static::on(static::EVENT_THEME_LIST, $callback);
    }

    public static function onPreSystem($callback)
    {
        static::on(static::EVENT_PRE_SYSTEM, $callback);
    }

    public static function onFiltersConfig($callback)
    {
        static::on(static::EVENT_FILTERS_CONFIG, $callback);
    }

    public static function onPagerConfig($callback)
    {
        static::on(static::EVENT_PAGER_CONFIG, $callback);
    }

    public static function onViewConfig($callback)
    {
        static::on(static::EVENT_VIEW_CONFIG, $callback);
    }    

    public static function onValidationConfig($callback)
    {
        static::on(static::EVENT_VALIDATION_CONFIG, $callback);
    }

    public static function pagerConfig($templates, $perPage)
    {
        $event = new Event;

        $event->templates = $templates;

        $event->perPage =  $perPage;

        static::trigger(static::EVENT_PAGER_CONFIG, $event);

        return [
            $event->templates,
            $event->perPage
        ];
    }

    public static function validationConfig($ruleSets, $templates)
    {
        $event = new Event;

        $event->ruleSets = $ruleSets;

        $event->templates = $templates;

        static::trigger(static::EVENT_VALIDATION_CONFIG, $event);

        return [
            $event->ruleSets,
            $event->templates
        ];
    }

    public static function viewConfig($saveData, $filters, $plugins)
    {
        $event = new Event;

        $event->saveData = $saveData;

        $event->filters = $filters;

        $event->plugins = $plugins;

        static::trigger(static::EVENT_VIEW_CONFIG, $event);

        return [
            $event->saveData,
            $event->filters,
            $event->plugins
        ];
    }

    public static function filtersConfig($aliases, $globals, $methods, $filters)
    {
        $event = new Event;

        $event->aliases = $aliases;

        $event->globals =  $globals;

        $event->methods = $methods;

        $event->filters = $filters;

        static::trigger(static::EVENT_FILTERS_CONFIG, $event);

        return [
            $event->aliases,
            $event->globals,
            $event->methods,
            $event->filters
        ];
    }

    public static function themeList($return = [])
    {
        $event = new Event;

        $event->result = $return;

        static::trigger(static::EVENT_THEME_LIST, $event);

        return $event->result;
    }

}