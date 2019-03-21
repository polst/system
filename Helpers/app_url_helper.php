<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
if (!function_exists('app_url'))
{
    function app_url($path = '', array $params = [], string $scheme = null, App $altConfig = null) : string
    {
    	if ($params)
    	{
    		$path .= '?' . http_build_query($params);
    	}

    	return site_url($path, $scheme, $altConfig);
    }
}
