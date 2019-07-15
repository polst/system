<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System;

abstract class BaseSystemEvents extends \CodeIgniter\Events\Events
{

    const EVENT_INSTALL = 'install';

    const EVENT_THEMES = 'themes';    

    public static function onThemes($callback)
    {
        static::on(static::EVENT_THEMES, $callback);
    }

    public static function onInstall($callback)
    {
        static::on(static::EVENT_INSTALL, $callback);
    }

}