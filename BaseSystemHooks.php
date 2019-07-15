<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System;

use BasicApp\Admin\Controllers\Config as ConfigController;
use BasicApp\System\Controllers\Admin\Message as MessageController;
use BasicApp\Helpers\Url;
use BasicApp\System\Models\MessageConfigModel;
use BasicApp\System\Models\SystemConfigModel;

abstract class BaseSystemHooks
{

    public static function preSystem()
    {
        helper([
            'app_view',
            'message'
        ]);
    }

    public static function adminOptionsMenu($menu)
    {
        if (ConfigController::checkAccess())
        {
            $menu->items[MessageConfigModel::class] = [
                'label' => t('admin.menu', 'Messages'),
                'icon' => 'fa fa-envelope',
                'url' => Url::createUrl('admin/config', ['class' => MessageConfigModel::class])
            ];

            $menu->items[SystemConfigModel::class] = [
                'label' => t('admin.menu', 'System'),
                'icon' => 'fa fa-desktop',
                'url' => Url::createUrl('admin/config', ['class' => SystemConfigModel::class])
            ];
        }
    }

    public static function adminMainMenu($menu)
    {
        $menu->items['system'] = [
            'url'   => '#',
            'label' => t('admin.menu', 'System'),
            'icon'  => 'fa fa-wrench'
        ];

        if (MessageController::checkAccess())
        {
            $menu->items['system']['items']['messages'] = [
                'url'   => Url::createUrl('admin/message'),
                'label' => t('admin.menu', 'Messages'),
                'icon'  => 'fa fa-envelope'
            ];
        }
    }


}