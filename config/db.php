<?php
/**
 * Настройки подключения к БД
 */

$dblocation = "127.0.0.1";
$dbname = "shop";
$dbuser = "root";
$dbpasswd = "";

//соединяемся с БД
$db = mysqli_connect($dblocation, $dbuser, $dbpasswd, $dbname);
//$db = mysql_connect($dbpasswd, $dbuser, $dbname);
//$db = mysql_connect($dblocation, $dbuser, $dbpasswd);

if(! $db){
    echo 'Ошибка доступа к MySQL';
    exit();
}

//Кодировка для текущего соединения
mysqli_set_charset($db,'utf8');


if(!mysqli_select_db($db,$dbname)){
    echo 'Ошибка доступа к базе данных'.$dbname;
    exit();
}