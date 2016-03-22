<?php
/**
 * Контроллер страницы пользователей /user/
 * 
 */

//подключаем модели
//include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';


function indexAction($smarty){
    if(!isset($_SESSION['user'])) {
        redirect('/');
    }
    
    $smarty->assign('pageTitle','Страница пользователя');
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}

/**
 * AJAX регистрация пользователя
 * @param $_REQUEST данные получаеммые из формы
 */
function registerAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);
    
    $resData = null;
    $resData = checkRegisterParams($email,$pwd1,$pwd2);//loc:models/UsersModel.php
    
    if(! $resData && checkUserEmail($email)){//loc:models/UsersModel.php
        $resData['success'] = 0;
        $resData['message'] = "Пользователь с таким email ('{$email}') уже зарегистрирован!";
    }
    
    if(! $resData) {
        $pwdMD5 = md5($pwd1);
        $userData = registerNewUser($email, $pwdMD5, $name, $phone, $adress);//loc:models/UsersModel.php
        //var_dump($userData);
        if($userData['success']){
            $resData['message'] = 'Пользователь успешно зарегистрирован';
            $resData['success'] = 1;
            
            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            
        }
        else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации!';
        }
        
    }
    echo json_encode($resData);
        
}

function logoutAction(){
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    redirect('/');
}

/**
 * AJAX авторизация
 * @return json массив данных пользователя
 */
function loginAction(){
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    
    $pwd = isset($_REQUEST['pwd']) ? $_REQUEST['pwd'] : null;
    $pwd = trim($pwd);
    
    $userData = loginUser($email,$pwd);
    
    if($userData['success']){
        $userData = $userData[0];
        
        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        
        $resData = $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Неверно введены логин или пароль!';
    }
    
    echo json_encode($resData);
    
}

function updateAction(){
    if(!isset($_SESSION['user'])) {
        redirect('/');
    }
    
    $resData = array();
    $name = isset($_REQUEST['newName']) ? $_REQUEST['newName'] : null;
    $phone = isset($_REQUEST['newPhone']) ? $_REQUEST['newPhone'] : null;
    $adress = isset($_REQUEST['newAdress']) ? $_REQUEST['newAdress'] : null;
    $pwd1 = isset($_REQUEST['newPwd1']) ? $_REQUEST['newPwd1'] : null;
    $pwd2 = isset($_REQUEST['newPwd2']) ? $_REQUEST['newPwd2'] : null;
    $curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;
    
    $curPwdMd5 = md5($curPwd);
    if(!$curPwd || ($_SESSION['user']['pwd'] != $curPwdMd5)){
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароль не верный!';
        echo json_encode($resData);
        return false;
    }
    $res1 = null;
    $res1 = updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwdMd5);
    //alert($res);
    if($res1){
        $resData['success'] = 1;
        $resData['message'] = 'Данные сохранены';
        $resData['userName'] = $name;
        
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['adress'] = $adress;
        
        $newPwd = $_SESSION['user']['pwd'];
        if($pwd1 && ($pwd1 == $pwd2)){
            $newPwd = md5(trim($pwd1));
        }
        $_SESSION['user']['pwd'] = $newPwd;
        $_SESSION['user']['displayName']= $name ? $name : $_SESSION['user']['email'];
    }
    else{
        $resData['success']=0;
        $resData['message']='Ошибка сохранения данных';
    }
    echo json_encode($resData);
}