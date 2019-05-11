<?php
/**
 * @package Basic App System
 * @license MIT License
 * @link    http://basic-app.com
 */
namespace BasicApp\System\Components;

use Closure;
use PHPTheme;
use BasicApp\System\Config\System;

abstract class BaseTheme extends \BasicApp\Core\Theme
{

    protected $formErrors = [];

    protected $tableLabels = [];

    public function widget(string $name, array $params = [])
    {
        $config = config(System::class);

        PHPTheme::$namespace = $config->getThemeName();

        PHPTheme::$path = $config->theme;

        return PHPTheme::widget($name, $params);
    }

    public function setFormErrors(array $errors)
    {
        $this->formErrors = $errors;
    }

    public function formOpen($action = '', $attributes = '', array $hidden = [])
    {
        helper(['form']);

        return form_open($action, $attributes, $hidden);
    }

    public function formClose()
    {
        helper(['form']);

        return form_close();
    }

    public function formErrors(array $options = [])
    {
        return $this->widget('formErrors', [
            'errors' => $this->formErrors,
            'options' => $options
        ]);
    }

    public function formButton(string $label, array $options = [])
    {
        return $this->widget('formButton', [
            'label' => $label,
            'options' => $options
        ]);
    }

    public function formSubmit(string $label, array $options = [])
    {
        if (array_key_exists('type', $options))
        {
            $options['type'] = 'submit';
        }

        return $this->formButton($label, $options);
    }

    public function formInput(object $model, string $name, array $options = [])
    {
        return $this->widget('formFieldText', [
            'name'  => $name,
            'value' => $model->$name,
            'label' => $model->label($name),
            'error' => array_key_exists($name, $this->formErrors) ? $this->formErrors[$name] : null,
            'options' => $options
        ]);
    }

    public function formCheckbox(object $model, string $name, array $options = [])
    {
        return $this->widget('formFieldCheckbox', [
            'name'  => $name,
            'value' => $model->$name,
            'label' => $model->label($name),
            'error' => array_key_exists($name, $this->formErrors) ? $this->formErrors[$name] : null,
            'options' => $options
        ]);
    }

    public function formPassword(object $model, string $name, array $options = [])
    {
        $options['type'] = 'password';

        return $this->widget('formFieldText', [
            'name'  => $name,
            'value' => '',
            'label' => $model->label($name),
            'error' => array_key_exists($name, $this->formErrors) ? $this->formErrors[$name] : null,
            'options' => $options
        ]);
    }

    public function formSelect(object $model, string $name, array $items, array $options = [])
    {
        return $this->widget('formFieldSelect', [
            'name'  => $name,
            'value' => $model->$name,
            'label' => $model->label($name),
            'error' => array_key_exists($name, $this->formErrors) ? $this->formErrors[$name] : null,
            'items' => $items,
            'options' => $options
        ]);
    }

    public function table(array $elements, Closure $function)
    {
        $rows = [];

        $header = [];

        $i = 0;

        foreach($elements as $model)
        {
            $row = $function($this, $model);

            if ($i == 0)
            {
                foreach($row['columns'] as $col)
                {
                    if (array_key_exists('header', $col))
                    {
                        $header[] = $col['header'];
                    }
                    else
                    {
                        $header[] = [
                            'content' => ''
                        ];
                    }
                }
            }

            $rows[] = $this->tableRow($row);

            $i++;
        }

        return $this->widget('table', [
            'head' => [
                'columns' => $header
            ],
            'rows' => $rows
        ]);
    }

    public function tableRow(array $row)
    {
        return $this->widget('tableRow', $row);
    }

    public function intColumn($model, string $field, array $return = [])
    {
        $value = $model->$field;

        return array_merge([
                'header' => [
                    'content' => '#',
                    'preset' => 'id small'
                ],
                'preset' => 'id small',
                'content' => $value
            ], 
            $return
        );
    }

    public function dateColumn($model, string $field, array $return = [])
    {
        $value = $model->$field;

        return array_merge([
                'header' => [
                    'content' => $model->label($field),
                    'preset' => 'medium'
                ],
                'preset' => 'medium',
                'content' => $value
            ],
            $return
        );
    }

    public function primaryColumn($model, string $field, array $return = [])
    {
        $value = $model->$field;

        return array_merge([
                'header' => [
                    'content' => $model->label($field)
                ],
                'preset' => 'primary',
                'content' => $value
            ],
            $return
        );
    }    

    public function stringColumn($model, string $field, array $return = [])
    {
        $value = $model->$field;

        return array_merge([
                'header' => [
                    'content' => $model->label($field)
                ],
                'content' => $value
            ],
            $return
        );
    }

    public function boolColumn($model, string $field, array $return = [])
    {
        $value = $model->$field;

        return array_merge([
                'header' => [
                    'content' => $model->label($field)
                ],
                'content' => $value ? t('admin', 'Yes') : t('admin', 'No')
            ],
            $return
        );
    }    

    public function linkColumn(string $label, string $url, array $return = [])
    {
        return array_merge([
                'header' => [
                    'preset' => 'button'
                ],
                'preset' => 'button',
                'type' => 'link',
                'label' => $label,
                'url' => $url
            ],
            $return
        );
    }

    public function updateColumn(string $url, array $return = [])
    {
        return array_merge([
                'header' => [
                    'preset' => 'button'
                ],
                'preset' => 'button',
                'content' => $this->widget('tableButtonUpdate', [
                    'url' => $url
                ])
            ],
            $return
        );
    }

    public function deleteColumn(string $url, array $return = [])
    {
        return array_merge([
                'header' => [
                    'preset' => 'button'
                ],                
                'preset' => 'button',
                'content' => $this->widget('tableButtonDelete', [
                    'url' => $url
                ])
            ],
            $return
        );
    }

}