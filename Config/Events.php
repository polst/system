<?php

use BasicApp\System\SystemEvents;

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