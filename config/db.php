<?php
/**
 * Настройки подключения к БД
 */

$dblocation = "127.0.0.1";
$dbname = "shop";
$dbuser = "root";
$dbpasswd = "";

//соединяемся с БД
$db = mysql_connect($dblocation, $dbuser, $dbpasswd);
//$db = mysql_connect($dbpasswd, $dbuser, $dbname);
//$db = mysql_connect($dblocation, $dbuser, $dbpasswd);

if(! $db){
    echo 'Ошибка доступа к MySQL';
    exit();
}

//Кодировка для текущего соединения
mysql_set_charset('utf8');


if(!mysql_select_db($dbname,$db)){
    echo 'Ошибка доступа к базе данных'.$dbname;
    exit();
}