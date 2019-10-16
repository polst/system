<?php

namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BasePager extends \CodeIgniter\Config\BaseConfig
{

    public function __construct()
    {
        parent::__construct();

        $this->templates['theme'] = 'BasicApp\System\pager';

        list($this->templates, $this->perPage) = SystemEvents::pagerConfig($this->templates, $this->perPage);
    }

}