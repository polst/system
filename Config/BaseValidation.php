<?php

namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseValidation
{

    public function __construct()
    {
        SystemEvents::validation($this);
    }

}