<?php

// DEPRECATED
// Use BasicApp\Core\Url class methods.

use Config\App;
use BasicApp\Core\Url;

function classic_url($path = '', array $params = [], string $scheme = null, App $altConfig = null) : string
{
    return Url::createUrl($path, $params, $scheme, $altConfig);
}

function classic_uri_string($params = [])
{
    return Url::currentUriString($params);
}

function classic_current_url($params = [], string $scheme = null, App $altConfig = null)
{
    return Url::currentUrl($params, $scheme, $altConfig);
}