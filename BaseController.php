<?php
/**
 * @author Basic App Dev Team
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System;

use BasicApp\System\SystemEvents;

abstract class BaseController extends \BasicApp\Core\Controller
{

	protected $layout = 'BasicApp\System\layout';

	public function __construct()
	{
		parent::__construct();

        SystemEvents::controller($this);
	}

}