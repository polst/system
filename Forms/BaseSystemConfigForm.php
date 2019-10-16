<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Forms;

use BasicApp\System\Config\System as SystemConfig;
use BasicApp\Core\Form;
use BasicApp\System\SystemEvents;

abstract class BaseSystemConfigForm extends \BasicApp\Configs\DatabaseConfigForm
{

    protected $returnType = SystemConfig::class;

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

    public function renderFields(Form $form)
    {
        $return = '';

        $return .= $form->dropdownGroup($this, 'theme', static::themeList(['' => '...']));

        return $return;
    }

    public static function themeList($return = [])
    {
        return SystemEvents::themeList($return);
    }

}