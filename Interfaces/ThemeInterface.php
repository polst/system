<?php

namespace BasicApp\System\Interfaces;

interface ThemeInterface
{

    public function breadcrumbs(array $params = []);

    public function actionMenu(array $params = []);

    public function mainMenu(array $params = []);

    public function mainLayout(array $params = []);

}