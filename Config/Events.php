<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
use BasicApp\System\Forms\SystemConfigForm;
use BasicApp\Configs\Controllers\Admin\Config as ConfigController;
use BasicApp\Helpers\Url;

BasicApp\Core\CoreEvents::onPreSystem(function() {

    helper('app_view');

});

BasicApp\Admin\AdminEvents::onAdminMainMenu(function($menu) {

    $menu->items['system']['url'] = '#';
    $menu->items['system']['label'] = t('admin.menu', 'System');
    $menu->items['system']['icon'] = 'fa fa-wrench';

});

BasicApp\Admin\AdminEvents::onAdminOptionsMenu(function($menu) {

    if (ConfigController::checkAccess())
    {
        $menu->items[SystemConfigForm::class] = [
            'label' => t('admin.menu', 'System'),
            'icon' => 'fa fa-desktop',
            'url' => Url::createUrl('admin/config', ['class' => SystemConfigForm::class])
        ];
    }

});