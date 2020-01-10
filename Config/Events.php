<?php

use BasicApp\System\SystemEvents;
use BasicApp\Admin\AdminEvents;
use BasicApp\Site\SiteEvents;
use BasicApp\Helpers\Url;
use BasicApp\System\Forms\SystemConfigForm;

SystemEvents::onPreSystem(function()
{
    helper(['app_view', 't', 'current_lang']);
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