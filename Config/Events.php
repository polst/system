<?php

use BasicApp\System\Components\Events;
use BasicApp\System\Hooks\PreSystem;
use BasicApp\System\Hooks\AdminOptionsMenu;
use BasicApp\System\Hooks\AdminMainMenu;

Events::preSystem(function() 
{
    PreSystem::run();
});

Events::adminMainMenu(function($menu) 
{
    AdminMainMenu::run($menu);
});

Events::adminOptionsMenu(function($menu)
{
    AdminOptionsMenu::run($menu);
});