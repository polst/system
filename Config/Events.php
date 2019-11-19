<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\System\SystemEvents;
use BasicApp\Admin\AdminEvents;
use BasicApp\Site\SiteEvents;
use BasicApp\Helpers\Url;
use BasicApp\System\Forms\SystemConfigForm;

SystemEvents::onPreSystem(function()
{
    helper('app_view');
});

SystemEvents::onValidation(function($event)
{
    $event->ruleSets[] = BasicApp\Validators\HtmlTagsValidator::class;
    $event->ruleSets[] = BasicApp\Validators\NotHtmlTagsValidator::class;
    $event->ruleSets[] = BasicApp\Validators\NotSpecialCharsValidator::class;
});

if (class_exists(SiteEvents::class))
{
    SiteEvents::onSeed(function($created) {
        if ($created)
        {
            block('layout.siteName', 'My Site');
            block('layout.copyright', '&copy; My Company {year}');
            block('layout.defaultTitle', 'My Site Default Title');
        }
    });
}

if (class_exists(AdminEvents::class))
{
    AdminEvents::onOptionsMenu(function($event)
    {
        if (BasicApp\Config\Controllers\Admin\Config::checkAccess())
        {
            $event->items[SystemConfigForm::class] = [
                'label' => t('admin.menu', 'System'),
                'icon' => 'fa fa-wrench',
                'url' => Url::createUrl('admin/config', ['class' => SystemConfigForm::class])
            ];
        }
    });
}