<?php
/**
 * Основные функции
 */

/**
 * Формирование запрашиваемой страницы
 * 
 * @param object $smarty объект шаблонизатора
 * @param string $controllerName Название контроллера
 * @param string $actionName Название функции обработки старницы
 */
function loadPage($smarty,$controllerName,$actionName = 'index'){
    include_once PathPrefix . $controllerName . PathPostfix;
    $function = $actionName . 'Action';
    $function($smarty);
}

/**
 * Загрузка шаблона
 * 
 * @param object $smarty объект шаблонизатора
 * @param string $templateName имя файла шаблона
 */
function loadTemplate($smarty,$templateName){
    $smarty->display($templateName . TemplatePostfix);
}
