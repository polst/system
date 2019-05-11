<?php

namespace BasicApp\System\Config;

use BasicApp\System\Models\SystemConfigModel;

abstract class BaseSystem extends \BasicApp\Core\DatabaseConfig
{

    public static $modelClass = SystemConfigModel::class;

    public $theme;

    public $adminTheme;

    public function __construct()
    {
        $this->theme = $this->getDefaultTheme();

        $this->adminTheme = $this->getDefaultAdminTheme();

        parent::__construct();
    }

    public static function themeListItems() : array
    {
        $modelClass = static::$modelClass;

        return $modelClass::themeListItems();
    }

    public static function adminThemeListItems() : array
    {
        $modelClass = static::$modelClass;

        return $modelClass::adminThemeListItems();
    }

    public function getDefaultTheme() : string
    {
        $items = static::themeListItems();

        if (count($items) > 0)
        {
            $items = array_keys($items);

            return array_shift($items);
        }

        return '';
    }

    public function getDefaultAdminTheme() : string
    {
        $items = static::adminThemeListItems();

        if (count($items) > 0)
        {
            $items = array_keys($items);

            return array_shift($items);
        }

        return '';
    }

    public function getThemeName() : string
    {
        if ($this->theme)
        {
             $items = static::themeListItems();

             if (array_key_exists($this->theme, $items))
             {
                return $items[$this->theme];
             }
        }

        return '';
    }

    public function getAdminThemeName() : string
    {
        if ($this->adminTheme)
        {
             $items = static::adminThemeListItems();

             if (array_key_exists($this->adminTheme, $items))
             {
                return $items[$this->adminTheme];
             }
        }

        return '';        
    }

}