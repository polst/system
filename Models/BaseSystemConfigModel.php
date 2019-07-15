<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Models;

use BasicApp\System\Config\System;
use BasicApp\Core\Form;
use BasicApp\System\SystemEvents;

abstract class BaseSystemConfigModel extends \BasicApp\Core\DatabaseConfigModel
{

    protected $returnType = System::class;

    protected $validationRules = [
        'theme' => 'max_length[255]|required'
    ];

    protected $labels = [
        'theme' => 'Theme'
    ];

    protected $translations = 'system';

    public static function getFormName()
    {
        return t('admin.menu', 'System');
    }

    public static function renderFields(Form $form)
    {
        $return = '';

        $return .= $form->dropdown('theme', static::themeList(['' => '...']));

        return $return;
    }

    public static function themeList($return = [])
    {
        return SystemEvents::themes($return);
    }

}