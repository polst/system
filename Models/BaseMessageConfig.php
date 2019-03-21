<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Models;

use BasicApp\Core\DatabaseConfig;
use PHPMailer\PHPMailer\PHPMailer;

abstract class BaseMessageConfig extends DatabaseConfig
{

	public $from_email;

	public $from_name;

    public $smtp_enabled = 0;

    public $smtp_host;

    public $smtp_username;

    public $smtp_password;

    public $smtp_port;

    public $smtp_secure;

    public $admin_name;

    public $admin_email;

    public $reply_to_type = MessageConfigModel::REPLY_TO_NONE;

    public $charset = PHPMailer::CHARSET_UTF8;

    public $encoding =PHPMailer::ENCODING_BASE64;

}