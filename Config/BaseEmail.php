<?php

namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseEmail extends \CodeIgniter\Config\BaseConfig
{

    public function __construct()
    {
        SystemEvents::email($this);
    }

}