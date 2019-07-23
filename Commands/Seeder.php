<?php

namespace BasicApp\System\Commands;

use BasicApp\System\SystemEvents;

class Seeder extends \BasicApp\Core\Command
{

    protected $group = 'Application';
    
    protected $name = 'seeder';
    
    protected $description = 'Runs seeder trigger.';

    public function run(array $params)
    {
        SystemEvents::seeder();

        echo 'done' . "\n";
    }

}