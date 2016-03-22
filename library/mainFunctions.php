<?php
/**
 * Основные функции
 */
function getTree($arr){
   
    $out = '';
   
    $out .= '';
    foreach($arr as $k=>$v){
       
        $out .= '<li><a href="/category/'.$k.'/">'.$v['name'].'</a>';
        if(!empty($v['children'])){
            $out.='<ul>';
            $out .= getTree($v['children']);
            //$classs='';
        }
       $out .= '</li>';
    }
    $out .= '</ul>';
    return $out;
   
}
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

/**
 * Преобразование результата работы функции выборки в ассоциативный массив
 * @param recordset $rs набор строк - результат работы SELECT
 * @return array ассоциативный массив
 */
function createSmartyRsArray($rs){
    if(! $rs) return false;
    $smartyRs = array();
    while($row = mysql_fetch_assoc($rs)){
        $smartyRs[] = $row;
    }
    return $smartyRs;
}

function redirect($url){
    if(! $url) $url = '/';
    header("Location: {$url}");
    exit();
}