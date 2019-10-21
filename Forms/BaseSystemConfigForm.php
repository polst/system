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

abstract class BaseSystemConfigForm extends \BasicApp\Config\BaseConfigForm
{

    protected $returnType = SystemConfig::class;

    protected $validationRules = [
        'theme' => 'max_length[255]|required'
    ];

    protected $fieldLabels = [
        'theme' => 'Theme'
    ];

    protected $translations = 'system';

    public function renderForm(Form $form, $data)
    {
        $return = '';

        $return .= $form->dropdownGroup($data, 'theme', static::themes(['' => '...']));

        return $return;
    }

    public static function themes($return = [])
    {
        return SystemEvents::themes($return);
    }

}