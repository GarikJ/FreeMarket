<?php

include_once 'models/CategoriesModel.php';
include_once 'models/ProductsModel.php';

function indexAction($smarty)
{
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($catId == null) exit();

    $rsChildCats = null;
    $rsProducts = null;
    $rsCategory = getCatById($catId);

    if ($rsCategory['parent_id'] == 0) {
        $rsChildCats = getChildrenForCat($catId);
    }
    if ($rsCategory['parent_id'] !== 0) {
        $rsProducts = getProductsByCat($catId);        
    }

	$rsCategories = getAllMainCatsWithChildren();
	
	$smarty->assign('pageTitle', 'Товары категории ' . $rsCategory['name']);

	$smarty->assign('rsCategory', $rsCategory);
	$smarty->assign('rsProducts', $rsProducts);
    $smarty->assign('rsChildCats', $rsChildCats);

    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
    
}
