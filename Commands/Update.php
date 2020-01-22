<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Commands;

use BasicApp\System\SystemEvents;

class Update extends \BasicApp\Core\Command
{

    protected $group = 'Basic App';
    
    protected $name = 'ba:update';

    protected $description = 'Runs the "ba:update" trigger.';

    public function run(array $params)
    {
        SystemEvents::update($params);
    }

}