<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseAppEmail extends \CodeIgniter\Config\BaseConfig
{

    public function __construct()
    {
        SystemEvents::email($this);
    }

}