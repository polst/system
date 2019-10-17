<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Commands;

use BasicApp\System\SystemEvents;

class Seed extends \BasicApp\Core\Command
{

    protected $group = 'Basic App';
    
    protected $name = 'ba:seed';
    
    protected $description = 'Runs the "ba:seed" trigger.';

    public function run(array $params)
    {
        SystemEvents::seed();
    }

}