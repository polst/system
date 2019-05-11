<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Hooks;

use BasicApp\System\Controllers\Admin\Message as MessageController;
use BasicApp\Core\Url;

abstract class BaseAdminMainMenu
{

    public static function addMessageConfig($menu)
    {
        $menu->items['system']['items']['messages'] = [
            'url'   => Url::createUrl('admin/message'),
            'label' => t('admin.menu', 'Messages'),
            'icon'  => 'fa fa-envelope'
        ];
    }

    public static function addSystemConfig($menu)
    {
        $menu->items['system'] = [
            'url'   => '#',
            'label' => t('admin.menu', 'System'),
            'icon'  => 'fa fa-wrench'
        ];
    }

    public static function run($menu)
    {
        static::addSystemConfig($menu);

        if (MessageController::checkAccess())
        {
            static::addMessageConfig($menu);
        }
    }

}