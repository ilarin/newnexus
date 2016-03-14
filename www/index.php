<?php

session_start();//старт сессии

//ксли в сессии нет массива корзины то создаем его
if(!isset($_SESSION['cart'])){
    $_SESSION['cart'] = array();
}


include_once '../config/config.php';//инициализация настроек
include_once '../config/db.php';//подключение к БД
include_once '../library/mainFunctions.php';//основные функции

//определяем с каким контроллером будем работать
$controllerName = (isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index');
//определяем с какой функцией будем работать
$actionName = (isset($_GET['action']) ? $_GET['action'] : 'index');

if(isset($_SESSION['user'])){
    $smarty->assign('arUser',$_SESSION['user']);
}

//передаем в шаблон количество элементов в корзине из сессии
$smarty->assign('cartCntItems',  count($_SESSION['cart']));

//функция загрузки страниц 
//Локация: library/mainFunction.php
loadPage($smarty, $controllerName, $actionName);