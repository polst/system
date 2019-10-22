<?php

use BasicApp\Helpers\Url;
use BasicApp\System\SystemEvents;
use BasicApp\Site\SiteEvents;

$theme = service('theme');

SystemEvents::registerAssets($theme->head, $theme->beginBody, $theme->endBody);

if (class_exists(BasicApp\Site\SiteEvents::class))
{
    $mainMenu = menu_items('main', true, ['menu_name' => 'Main Menu']);
}
else
{
    $mainMenu = [];
}

if (array_key_exists('mainMenu', $this->data))
{
    $mainMenu = array_merge_recursive($mainMenu, $this->data['mainMenu']);
}

$siteName = 'Basic App';

if (class_exists(SiteEvents::class))
{
    $siteName = block('layout.siteName', 'Basic App');
}

echo $theme->mainLayout([
    'title' => array_key_exists('title', $this->data) ? $this->data['title'] : '',
    'siteName' => $siteName,
    'mainMenu' => [
        'items' => $mainMenu
    ],
    'actionMenu' => [
        'items' => array_key_exists('actionMenu', $this->data) ? $this->data['actionMenu'] : []
    ],
    'breadcrumbs' => [
        'items' => array_key_exists('breadcrumbs', $this->data) ? $this->data['breadcrumbs'] : []
    ],
    'content' => $content
]);
