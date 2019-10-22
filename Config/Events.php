<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\System\SystemEvents;
use BasicApp\Site\SiteEvents;

SystemEvents::onPreSystem(function() {

    helper('app_view');

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