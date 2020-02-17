<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Config\App;

use BasicApp\System\SystemEvents;

class View extends \CodeIgniter\Config\View
{

    public function __construct()
    {
        parent::__construct();

        SystemEvents::view($this);
    }

}