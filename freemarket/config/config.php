<?php

// константы для контроллеров
define('PathPrefix', 'controllers/');
define('PathPostfix', 'Controller.php');

// шаблоны визуала сайта
$template = 'default';

// пути к файлам шаблонов (*.tpl)
define('TemplatePrefix', 'views/'.$template.'/');
define('TemplatePostfix', '.tpl');

// пути к файлам шаблонов в вебпространстве
define('TemplateWebPath', '/templates/'.$template.'/');

// smarty инициализация
require('library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('tmp/smarty/templates_c');
$smarty->setCompileDir('tmp/smarty/cache');
$smarty->setCompileDir('library/Smarty/configs');

$smarty->assign('TemplateWebPath', TemplateWebPath);
