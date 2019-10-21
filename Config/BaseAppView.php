<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseAppView extends \CodeIgniter\Config\View
{

    public function __construct()
    {
        parent::__construct();

        SystemEvents::view($this);
    }

}