<?php

namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseValidation
{

    public function __construct()
    {
        list($this->ruleSets, $this->templates) = SystemEvents::validationConfig(
            $this->ruleSets, 
            $this->templates
        );
    }

}