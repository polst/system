<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
use BasicApp\System\Forms\SystemConfigForm;
use BasicApp\Helpers\Url;

BasicApp\Core\CoreEvents::onPreSystem(function() {

    helper('app_view');

});