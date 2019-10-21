<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseAppPager extends \CodeIgniter\Config\BaseConfig
{

    public function __construct()
    {
        parent::__construct();

        $this->templates['theme'] = 'BasicApp\System\pager';

        SystemEvents::pager($this);
    }

}