<?php

// контроллер функций пользователя

include_once 'models/CategoriesModel.php';
include_once 'models/UsersModel.php';

function registerAction()
{
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);

    $pass1 = isset($_REQUEST['pass1']) ? $_REQUEST['pass1'] : null;
    $pass2 = isset($_REQUEST['pass2']) ? $_REQUEST['pass2'] : null;

    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $phone = trim($phone);
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $adress = trim($adress);
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);
    $bio = isset($_REQUEST['bio']) ? $_REQUEST['bio'] : null;
    $bio = trim($bio);

    $resData = null;
    $resData = checkRegisterParams($name, $email, $pass1, $pass2);

    if (! $resData && checkUserEmail($email)) {
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким мылом('{$email}') уже существует";
    }
    if (! $resData && checkUserName($name)) {
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким Name('{$name}') уже существует";
    }

    if (! $resData){
        $passMD5 = md5($pass1);
        
        $userData = registerNewUser($email, $passMD5, $name, $phone, $adress, $bio);
        if($userData['success']){
            $resData['message'] = 'Congrats U Win a Registration';
            $resData['success'] = 1;

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Try again kek';
        }
    }

    echo json_encode($resData);

}

function logoutAction()
{
    if(isset($_SESSION['user'])){
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    redirect('/');
}

function loginAction()
{
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);

    $pass = isset($_REQUEST['pass']) ? $_REQUEST['pass'] : null;
    $pass = trim($pass);

    $userData = loginUser($name, $pass);

    if ($userData['success']) {
        $userData = $userData[0];

        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];

        $resData = $_SESSION['user'];
        $resData['success'] = 1;        
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Неверный логин или пароль';
    }
    echo json_encode($resData);
}

function indexAction($smarty)
{
    if (! isset($_SESSION['user'])) {
        redirect('/');
        }

    $rsCategories = getAllMainCatsWithChildren();
    
    $smarty->assign('pageTitle', 'Страница пользователя');

    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}

function updateAction()
{   
    if(! isset($_SESSION['user'])){
        redirect('/');
    }
    
    $resData = array();
    $bio  = isset($_REQUEST['bio'])  ? $_REQUEST['bio']    :null;
    $phone  = isset($_REQUEST['phone'])  ? $_REQUEST['phone']    :null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress']   :null;
    $name   = isset($_REQUEST['name'])   ? $_REQUEST['name']     :null;
    $pass1   = isset($_REQUEST['pass1'])   ? $_REQUEST['pass1']     :null;
    $pass2   = isset($_REQUEST['pass2'])   ? $_REQUEST['pass2']     :null;
    $curPass = isset($_REQUEST['curPass']) ? $_REQUEST['curPass']   :null;

   
    $curPassMD5 = md5($curPass);
    if( ! $curPass || ($_SESSION['user']['pass'] != $curPassMD5)){
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароль не верный';
        echo json_encode($resData);
        return false;
    }

    
    $res = updateUserData($name, $phone, $adress ,$pass1, $pass2, $curPassMD5, $bio);
    if($res){
        $resData['success']= 1;
        $resData['message']= 'Данные сохранены';
        $resData['userName']= $name;


        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['bio'] = $bio;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['adress'] = $adress;
        $newPass = $_SESSION['user']['pass'];
        if ( $pass1 && ($pass1 == $pass2)){
            $newPass = md5($pass1);
        }
        $_SESSION['user']['pass'] = $newPass;
        $_SESSION['user']['displayName'] = $name ? $name : $_SESSION['user']['email'];
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка сохранения данных';
    }

    echo json_encode($resData);
}
