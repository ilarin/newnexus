<?php
/**
 * Файл настроек
 */

//>Константы для обращения к контроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');
//<

//>используемый шаблон
$template = 'default';
//пути к файлам шаблонов .tpl
define('TemplatePrefix', '../views/'.$template.'/');
define('TemplatePostfix', '.tpl');
//пути к файлам шаблонов в вебпространстве
define('TemplateWebPath', '/templates/'.$template.'/');
//<

//>инициализация шаблонизатора Smarty
require '../library/Smarty/libs/Smarty.class.php';
$smarty = new Smarty();
$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c'); //chmod 777
$smarty->setCacheDir('../tmp/smarty/cache');// chmod 777
$smarty->setConfigDir('../library/Smarty/configs');

/**
 * Cоздаем новую переменную шаблонизатора и указываем ей путь
 * где будут храниться вспомогательные файлы шаблона
 */
$smarty->assign('templateWebPath',TemplateWebPath);
//<
