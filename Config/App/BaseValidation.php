<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Config\App;

use BasicApp\System\SystemEvents;

abstract class BaseValidation
{

    public function __construct()
    {
        SystemEvents::validation($this);
    }

}