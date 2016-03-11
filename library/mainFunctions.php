<?php
/**
 * Основные функции
 */

/**
 * Формирование запрашиваемой страницы
 * 
 * @param string $controllerName Название контроллера
 * @param string $actionName Название функции обработки старницы
 */
function loadPage($controllerName,$actionName = 'index'){
    include_once PathPrefix . $controllerName . PathPostfix;
    $function = $actionName . 'Action';
    $function();
}
