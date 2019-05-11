<?php

namespace BasicApp\System\Config;

use BasicApp\System\Components\AdminTheme;
use BasicApp\System\Components\Theme;
use StdClass;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

    public static function theme($getShared = false)
    {
        if (!$getShared)
        {
            return new Theme(new StdClass);
        }

        return static::getSharedInstance('theme');
    }    

    public static function adminTheme($getShared = false)
    {
        if (!$getShared)
        {
            return new AdminTheme(new StdClass);
        }

        return static::getSharedInstance('adminTheme');
    }

}