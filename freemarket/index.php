<?php
session_start();

if(! isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

include_once 'config/config.php';
include_once 'config/db.php';
include_once 'library/mainFunctions.php';

// выбор контроллера

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

//выбор функции

$actionName = isset($_GET['action']) ? ucfirst($_GET['action']) : 'index';

if(isset($_SESSION['user'])) {
    $smarty->assign('arUser', $_SESSION['user']);
}

// загрузка картинки в профиль(переделать на загрузку в базу)
if(isset($_FILES['file'])) { 
    $check = can_upload($_FILES['file']);
   
if($check === true) {
    make_upload($_FILES['file']);
    // echo "<strong>Файл успешно загружен!</strong>";  
}
if(isset($_FILES['file'])){
    $smarty->assign('nameImg', $_FILES['file']);
} else {
 // выводим сообщение об ошибке
    echo "<strong>$check</strong>";  
}
}

// инициализируем переменную шаблонизатора количества элементов в корзине

$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage ($smarty, $controllerName, $actionName);
