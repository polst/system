<?php

namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseFilters extends \CodeIgniter\Config\BaseConfig
{

    public function __construct()
    {
        parent::__construct();

        list($this->aliases, $this->globals, $this->methods, $this->filters) = SystemEvents::filtersConfig(
            $this->aliases,
            $this->globals,
            $this->methods,
            $this->filters
        );
    }


}