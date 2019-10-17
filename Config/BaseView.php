<?php

namespace BasicApp\System\Config;

use BasicApp\System\SystemEvents;

abstract class BaseView extends \CodeIgniter\Config\View
{

    public function __construct()
    {
        parent::__construct();

        SystemEvents::view($this);
    }

}