<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Config\App;

use BasicApp\System\SystemEvents;

class DocTypes
{

    public function __construct()
    {
        parent::__construct();

        SystemEvents::docTypes($this);
    }

}