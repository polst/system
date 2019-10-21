<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Components\Config;

use BasicApp\System\SystemEvents;

abstract class AppUserAgents extends \CodeIgniter\Config\BaseConfig
{

    public function __construct()
    {
        parent::__construct();

        SystemEvents::userAgents($this);
    }

}