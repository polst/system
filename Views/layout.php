<?php

use BasicApp\Helpers\Url;
use BasicApp\System\SystemEvents;

$theme = service('theme');

SystemEvents::registerAssets($theme->head, $theme->beginBody, $theme->endBody);

echo $theme->mainLayout([
    'title' => array_key_exists('title', $this->data) ? $this->data['title'] : '',
    'mainMenu' => [
        'items' => SystemEvents::mainMenu()
    ],
    'actionMenu' => [
        'items' => array_key_exists('actionMenu', $this->data) ? $this->data['actionMenu'] : []
    ],
    'breadcrumbs' => [
        'items' => array_key_exists('breadcrumbs', $this->data) ? $this->data['breadcrumbs'] : []
    ],
    'content' => $content
]);
