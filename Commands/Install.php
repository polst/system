<?php

namespace BasicApp\System\Commands;

use BasicApp\System\SystemEvents;

class Install extends \BasicApp\Core\Command
{

    protected $group = 'Application';
    
    protected $name = 'install';
    
    protected $description = 'Runs install trigger.';

    public function run(array $params)
    {
    	SystemEvents::install();

    	echo 'done' . "\n";
    }

}