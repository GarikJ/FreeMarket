<?php

function registerNewUser($email, $passMD5, $name, $phone, $adress, $bio)
{
    global $sql, $pdo;

    $sql = "INSERT INTO users (`email`, `pass`, `name`, `phone`, `adress`, `bio`) VALUES ('{$email}', '{$passMD5}', '{$name}', '{$phone}', '{$adress}', '{$bio}')";

    $result = $pdo->query($sql);

    if($result) {

        $sql = "SELECT * FROM users WHERE (`email` = '{$email}' and `pass` = '{$passMD5}' and `name` = '{$name}') LIMIT 1";

        $result = $pdo->query($sql);
        $result = createSmartyRsArray($result);

        if (isset($result[0])) {
            $result['success'] = 1;
        } else {
            $result['success'] = 0;
        }
    } else {
        $result['success'] = 0;
    }
    return $result;
}

function checkRegisterParams($name, $email, $pass1, $pass2)
{
    global $sql, $pdo;

    $res = null ;

    if(! $name){
        $res['success'] = false;
        $res['message'] = 'Введите name';
    }
    elseif(! $email){
        $res['success'] = false;
        $res['message'] = 'Введите email';
    }
    elseif(! $pass1){
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
    }
    elseif(! $pass2){
        $res['success'] = false;
        $res['message'] = 'Введите повтор пароля';
    }
    elseif($pass1 != $pass2){
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают';
    }
    return $res;
}

// для авторизации через мыло

function checkUserEmail($email)
{
    global $sql, $pdo;
    
    $sql = "SELECT id FROM users WHERE email = '{$email}'";
    $result = $pdo->query($sql);

    return createSmartyRsArray($result);

    return $result;
}

//для авторизации через логин

function checkUserName($name)
{
    global $sql, $pdo;
    
    $sql = "SELECT id FROM users WHERE name = '{$name}'";
    $result = $pdo->query($sql);

    return createSmartyRsArray($result);

    return $result;
}

function loginUser($name, $pass)
{
    global $sql, $pdo;

    $pass = md5($pass);

    $sql = "SELECT * FROM users WHERE (`name` = '{$name}' and `pass` = '{$pass}') LIMIT 1";

    $result = $pdo->query($sql);
    $result = createSmartyRsArray($result);

    if (isset($result[0])) {
        $result['success'] = 1;
    } else {
        $result['success'] = 0;
    }    
    return $result;
}

function updateUserData($name, $phone, $adress, $pass1, $pass2, $curPass, $bio)
{
    global $sql, $pdo;

    $name = $_SESSION['user']['name'];

    $email = $_SESSION['user']['email'];
    
    $pass1 = trim($pass1);
    $pass2 = trim($pass2);

    $newPass = null;
    if( $pass1 && ($pass1 == $pass2)){
        $newPass = md5($pass1);
    }
    
    $sql = "UPDATE users SET ";

    if($newPass) {

        $sql .= "`pass` = '{$newPass}', ";
    }

    $sql .= "`name` = '{$name}', `phone` = '{$phone}', `adress` = '{$adress}', `bio` = '{$bio}' WHERE `email` = '{$email}' AND `pass` = '{$curPass}' LIMIT 1";

    $result = $pdo->query($sql);

    return $result;
}
