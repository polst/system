<?php
/**
 * @author Basic App Dev Team <dev@basic-app.com>
 * @license MIT
 * @link http://basic-app.com
 */
namespace BasicApp\System\Config;

use BasicApp\System\Forms\SystemConfigForm;

abstract class BaseSystemConfig extends \BasicApp\Configs\DatabaseConfig
{

    protected $modelClass = SystemConfigForm::class;

    public $theme;

    public function __construct()
    {
        parent::__construct();

        $list = $this->themeList();

        if (!$this->theme || !array_key_exists($this->theme, $list))
        {
            $this->theme = $this->getDefaultTheme();
        }
    }

    public function themeList() : array
    {
        $modelClass = $this->modelClass;

        return $modelClass::themeList();
    }

    public function getDefaultTheme() : string
    {
        $items = static::themeList();

        if (count($items) > 0)
        {
            $items = array_keys($items);

            return array_shift($items);
        }

        return '';
    }

    public function getThemeName() : string
    {
        if ($this->theme)
        {
             $items = static::themeList();

             if (array_key_exists($this->theme, $items))
             {
                return $items[$this->theme];
             }
        }

        return '';
    }

}