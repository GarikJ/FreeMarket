<?php

// формирование запрашиваемой страницы

function loadPage($smarty, $controllerName, $actionName = 'index')
{  
    include_once PathPrefix . $controllerName . PathPostfix;
   
    $function = $actionName . 'Action';
    $function($smarty);
}

// загрузка шаблона

function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName . TemplatePostfix);
}

function d($value = null, $die = 1)
{
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';
    
    if($die) die;
}

function createSmartyRsArray($result)
{
    if (! $result) return false;
    $smartyRs = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

    $smartyRs[] = $row;
    }
    return $smartyRs;
}

function redirect($url)
{
    if (! $url) $url = '/';
    header("Location: {$url}");
    exit;
}

function can_upload($file)
{
    if($file['name'] == '')
    return 'Вы не выбрали файл.';

    if($file['size'] == 0)
    return 'Файл слишком большой.';

    $getMime = explode('.', $file['name']);
    $mime = strtolower(end($getMime)); 
    $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');

    if(!in_array($mime, $types))
    return 'Недопустимый тип файла.';

    return true;
}

function make_upload($file)
{
    $name = $file['name'];
    copy($file['tmp_name'], 'images/users/' . $name);
}
