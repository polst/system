<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
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

}