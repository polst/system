<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
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