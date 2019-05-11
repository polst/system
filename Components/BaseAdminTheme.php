<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Components;

use BasicApp\System\Config\System;
use PHPTheme;

abstract class BaseAdminTheme extends Theme
{

    public function widget(string $name, array $params = [])
    {
        $config = config(System::class);

        PHPTheme::$namespace = $config->adminTheme;

        return PHPTheme::widget($name, $params);
    }

}