<?php

// контроллер главной страницы

include_once 'models/CategoriesModel.php';
include_once 'models/ProductsModel.php';

function testAction() {
    echo 'IndexController.php > testAction';
}

// формирование главной страницы

function indexAction($smarty) {

	$rsCategories = getAllMainCatsWithChildren();
	$rsProducts = getLastProducts(26);

	$smarty->assign('pageTitle', 'Главная страница сайта');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
