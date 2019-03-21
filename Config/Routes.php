<?php

$routes->add('admin/message', 'BasicApp\System\Controllers\Admin\Message::index');
$routes->add('admin/message/(:segment)', 'BasicApp\System\Controllers\Admin\Message::$1');