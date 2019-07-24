<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Config;

use Exception;

abstract class BaseServices extends \CodeIgniter\Config\BaseService
{

    public static function theme($getShared = true)
    {
        if (!$getShared)
        {
            $config = new SystemConfig;

            $themeClass = $config->theme;

            if (!$themeClass)
            {
                throw new Exception('Theme is not defined.');
            }

            $theme = new $themeClass;

            return $theme;
        }

        return static::getSharedInstance('theme');
    }

}