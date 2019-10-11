<?php

use BasicApp\System\Forms\SystemConfigForm;
use BasicApp\Helpers\Url;

BasicApp\Core\CoreEvents::onPreSystem(function() {

    helper('app_view');

});

CodeIgniter\Events\Events::on('admin_main_menu', function($menu) {

    $menu->items['system']['url'] = '#';
    $menu->items['system']['label'] = t('admin.menu', 'System');
    $menu->items['system']['icon'] = 'fa fa-wrench';

});

CodeIgniter\Events\Events::on('admin_options_menu', function($menu) {

    if (BasicApp\Configs\Controllers\Admin\Config::checkAccess())
    {
        $menu->items[SystemConfigForm::class] = [
            'label' => t('admin.menu', 'System'),
            'icon' => 'fa fa-desktop',
            'url' => Url::createUrl('admin/config', ['class' => SystemConfigForm::class])
        ];
    }

});