<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
use Config\App;

function classic_url($path = '', array $params = [], string $scheme = null, App $altConfig = null) : string
{
	if ($params)
	{
		$path .= '?' . http_build_query($params);
	}

	return site_url($path, $scheme, $altConfig);
}

function classic_uri_string($applyParams = [])
{
	$return = uri_string();

	$params = $_GET;

	foreach($applyParams as $key => $value)
	{
		$params[$key] = $value;
	}

	if ($params)
	{
		$return .= '?' . http_build_query($params);
	}

	return $return;
}

function classic_current_url($params = [], string $scheme = null, App $altConfig = null)
{
	return site_url(classic_uri_string($params), $scheme, $altConfig);
}