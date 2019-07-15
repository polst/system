<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
use BasicApp\Core\CoreEvents;
use BasicApp\Admin\AdminEvents;
use BasicApp\System\SystemHooks;

CoreEvents::onPreSystem([SystemHooks::class, 'preSystem']);
AdminEvents::onAdminMainMenu([SystemHooks::class, 'adminMainMenu']);
AdminEvents::onAdminOptionsMenu([SystemHooks::class, 'adminOptionsMenu']);