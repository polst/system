<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Hooks;

use BasicApp\Admin\Controllers\Config as ConfigController;
use BasicApp\Core\Url;

abstract class BaseAdminOptionsMenu
{

    public static function addMessageConfig($menu)
    {
        $modelClass = 'BasicApp\System\Models\MessageConfigModel';

        $menu->items[$modelClass] = [
            'label' => $modelClass::getFormName(),
            'icon' => 'fa fa-envelope',
            'url' => Url::createUrl('admin/config', ['class' => $modelClass])
        ];
    }

    public static function addSystemConfig($menu)
    {
        $modelClass = 'BasicApp\System\Models\SystemConfigModel';

        $menu->items[$modelClass] = [
            'label' => $modelClass::getFormName(),
            'icon' => 'fa fa-desktop',
            'url' => Url::createUrl('admin/config', ['class' => $modelClass])
        ];
    }

    public static function run($menu)
    {
        if (ConfigController::checkAccess())
        {
            static::addMessageConfig($menu);

            static::addSystemConfig($menu);
        }
    }

}