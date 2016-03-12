<?php
/**
 * Контроллер главной страницы
 */

function testAction(){
    echo 'IndexController.php > testAction';
}

function indexAction($smarty){
    $smarty->assign('pageTitle','Главная страница сайта');
    loadTemplate($smarty,'index');
}