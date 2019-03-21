<?php

use CodeIgniter\Events\Events;

Events::on('pre_system', function()
{
	helper([
        'app_view', 
        'app_url', 
        'array_value', 
        'classic_url', 
        'message',
        'theme_widget',
        'admin_theme_widget'
    ]);
});

Events::on('admin_main_menu', function($menu) 
{
    $menu->items['system'] = [
        'url'   => '#',
        'label' => t('admin.menu', 'System'),
        'icon'  => 'fa fa-wrench'
    ];

    if (\BasicApp\System\Controllers\Admin\Message::checkAccess())
    {
        $menu->items['system']['items']['messages'] = [
            'url'   => site_url('admin/message'),
            'label' => t('admin.menu', 'Messages'),
            'icon'  => 'fa fa-envelope'
        ];
    }
});

Events::on('admin_options_menu', function($menu)
{
    if (\BasicApp\Admin\Controllers\Config::checkAccess())
    {
        $modelClass = 'BasicApp\System\Models\MessageConfigModel';

        $menu->items[$modelClass] = [
            'label' => $modelClass::getFormName(),
            'icon' => 'fa fa-envelope',
            'url' => classic_url('admin/config', ['class' => $modelClass])
        ];
    }
});