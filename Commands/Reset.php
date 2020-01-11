<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Commands;

use BasicApp\System\SystemEvents;

class Reset extends \BasicApp\Core\Command
{

    protected $group = 'Basic App';
    
    protected $name = 'ba:reset';
    
    protected $description = 'Runs the "ba:reset" trigger.';

    public function run(array $params)
    {
        SystemEvents::reset($params);
    }

}