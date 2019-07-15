<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Controllers\Admin;

use BasicApp\System\Models\Admin\MessageModel;
use BasicApp\Admin\Models\AdminModel;

abstract class BaseMessage extends \BasicApp\Admin\AdminCrudController
{

    protected static $roles = [AdminModel::ADMIN_ROLE];

	protected $modelClass = MessageModel::class;

	protected $viewPath = 'BasicApp\System\Admin\Message';

	protected $returnUrl = 'admin/message';	

}