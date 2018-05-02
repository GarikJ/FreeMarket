<?php

function getLastProducts($limit = null)
{
    global $sql, $pdo;
    $sql = "SELECT * FROM `products` ORDER BY id DESC";

    if($limit) {
        $sql .=  " LIMIT {$limit}";
    }
        $result = $pdo->query($sql);

    return createSmartyRsArray($result);
}

function getProductsByCat($itemId)
{
    global $sql, $pdo;

    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE category_id = '{$itemId}'";
        $result = $pdo->query($sql);

    return createSmartyRsArray($result);
}

function getProductById($itemId)
{
    global $sql, $pdo;

    $itemId = intval($itemId);
    $sql = "SELECT * FROM products WHERE id = '{$itemId}'";
        $result = $pdo->query($sql);

    return createSmartyRsArray($result);
}

function getProductsFromArray($itemsIds)
{
    global $sql, $pdo;

    if($itemsIds) {
        $strIds = implode($itemsIds, ', ');
        $sql = "SELECT * FROM products WHERE id in ({$strIds})";
            $result = $pdo->query($sql);

    return createSmartyRsArray($result);
    } else return false;
}
