<?php

namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseFilters extends \CodeIgniter\Config\BaseConfig
{

    public function __construct()
    {
        parent::__construct();

        SystemEvents::filters($this);
    }

}