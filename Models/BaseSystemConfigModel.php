<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Models;

use BasicApp\System\Config\System as SystemConfig;

abstract class BaseSystemConfigModel extends \BasicApp\Core\DatabaseConfigModel
{

    protected $returnType = SystemConfig::class;

    protected $validationRules = [
        'theme' => 'max_length[255]|required',
        'adminTheme' => 'max_length[255]|required'
    ];

    protected $labels = [
        'theme' => 'Theme',
        'adminTheme' => 'Admin Theme'
    ];

    protected $translations = 'system';

    public static function getFormName()
    {
        return t('admin.menu', 'System');
    }

    public static function getFormFields($model)
    {
        return [
            [
                'type' => 'select',
                'name' => 'theme',
                'label' => static::label('theme'),
                'value' => $model->theme,
                'items' => static::themeListItems()
            ],            
            [
                'type' => 'select',
                'name' => 'adminTheme',
                'label' => static::label('adminTheme'),
                'value' => $model->adminTheme,
                'items' => static::adminThemeListItems()
            ]
        ];
    }

    public static function themeListItems()
    {
        return [];
    }

    public static function adminThemeListItems()
    {
        return [];
    }

}