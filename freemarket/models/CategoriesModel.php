<?php

function getChildrenForCat($catId)
{
    global $sql, $pdo;

    $sql = "SELECT * FROM categories WHERE parent_id = '{$catId}'";
        $result = $pdo->query($sql);

    return createSmartyRsArray($result);
}

function getAllMainCatsWithChildren()
{
    global $sql, $pdo;

    $sql = 'SELECT * FROM categories WHERE parent_id = 0';
    $result = $pdo->query($sql);
    $smartyRs = array();
    
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        $rsChildren = getChildrenForCat ($row['id']);

        if($rsChildren){
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row;
    }

    return $smartyRs;
}

function getCatById($catId)
{
    global $sql, $pdo;

    $catId = intval($catId);
    $sql = "SELECT * FROM categories WHERE id = '{$catId}'";
        $result = $pdo->query($sql);

    return createSmartyRsArray($result);
}
