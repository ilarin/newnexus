<?php
/**
 * Модель для таблицы пользователей users
 */

/**
 * Регистрация нового пользователя
 * 
 * @param type $email
 * @param type $pwdMD5
 * @param type $name
 * @param type $phone
 * @param type $adress
 * @return type Description
 */
function registerNewUser($email,$pwdMD5,$name,$phone,$adress){
    $email = htmlspecialchars(mysql_escape_string($email));
    $name = htmlspecialchars(mysql_escape_string($name));
    $phone = htmlspecialchars(mysql_escape_string($phone));
    $adress = htmlspecialchars(mysql_escape_string($adress));
    
    $sql = "INSERT INTO 
        users (`email`, `pwd`, `name`, `phone`, `adress`) 
        VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";
    $rs = mysql_query($sql);
    
    if($rs){
        $sql = "SELECT * FROM `users`
             WHERE (`email` = '{$email}' and `pwd` = '{$pwdMD5}')
             LIMIT 1";
        $rs = mysql_query($sql);
        $rs = createSmartyRsArray($rs);
        
        if(isset($rs[0])){
            $rs['success'] = 1;
        }
        else {
            $rs['success'] = 0;
        }
    }
    else {
        $rs['success'] = 0;
    }
    return $rs;
}
/**
 * Проверка регистрационных данных
 * @param string $email емаил 
 * @param string $pwd1 пароль
 * @param string $pwd2 повтор пароля
 * @return array результат проверки пустой - успех, иначе ошибка
 */
function checkRegisterParams($email,$pwd1,$pwd2){
    $res = null;
    if(!$email){
        $res['success'] = false;
        $res['message'] = 'Введите email!';
    }
    if(!$pwd1){
        $res['success'] = false;
        $res['message'] = 'Введите пароль!';
    }
    if(!$pwd2){
        $res['success'] = false;
        $res['message'] = 'Введите повтор пароля!';
    }
    if($pwd1 !== $pwd2){
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают!';
    }
    return $res;
}

/**
 * Проверка наличия email
 * @param string $email емаил 
 * @return array ИД пользователя с таким емаил
 */

function checkUserEmail($email){
    $email = mysql_real_escape_string($email);
    
    $sql = "SELECT `id`
            FROM `users`
            WHERE `email` = '{$email}' LIMIT 1";
    $rs = mysql_query($sql);
    $rs = createSmartyRsArray($rs);
    return $rs;
}

function loginUser($email,$pwd){
    $email = htmlspecialchars(mysql_real_escape_string($email));
    $pwd = md5($pwd);
    
    $sql = "SELECT * FROM users
            WHERE (`email` = '{$email}' and `pwd` = '{$pwd}')
            LIMIT 1";
            
    $rs = mysql_query($sql);
    $rs = createSmartyRsArray($rs);
    
    if(isset($rs[0])){
        $rs['success'] = 1;
    }
    else {
        $rs['success'] = 0;
    }
    
    return $rs;
}

function updateUserData($name,$phone,$adress,$pwd1,$pwd2,$curPwd){
    error_reporting(E_ALL);
    $email = $_SESSION['user']['email'];
    $name = htmlspecialchars(mysql_real_escape_string($name));
    $phone = htmlspecialchars(mysql_real_escape_string($phone));
    $adress = htmlspecialchars(mysql_real_escape_string($adress));
    
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);
    
    $newPwd = null;
    if($pwd1 && ($pwd1 == $pwd2)){
        $newPwd = md5($pwd1);
    }
    $sql = "UPDATE `users` SET ";
    if($newPwd) {
        $sql .= "`pwd` = '{$newPwd}', ";
    }
    $sql .= "`name` = '{$name}',`phone` = '{$phone}', `adress` = '{$adress}' WHERE `email` = '{$email}' AND `pwd` = '{$curPwd}'";
    
       // echo $sql;
    $rs = mysql_query($sql) or mysql_error();
    //console.log($rs);
    return $rs;
    
}