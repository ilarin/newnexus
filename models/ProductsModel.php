<?php

/**
 * Модель для таблицы товаров (products)
 */

/**
 * Получение последних товаров из БД 
 * 
 * @param integer $limit количество выводимых товаров
 * @return array
 */
function getLastProducts($limit = null){
    $sql = "SELECT *
            FROM `products`
            ORDER BY `id` DESC";
    if($limit){
        $sql .= " LIMIT {$limit}";
    }
    //var_dump($sql);
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Получение продуктов для категори $catId
 * 
 * @param integer $catId ИД категории
 * @return array массив продуктов
 */
function getProductsByCat($catId){
    $catId = intval($catId);
    $sql = "SELECT *
            FROM `products`
            WHERE
            `category_id` = '{$catId}'
           ";
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Получить продукт по его ID
 * 
 * @param integer $itemId ID продукта
 * @return array массив данных продукта
 */
function getProductById($itemId){
    $itemId = intval($itemId);
    $sql = "SELECT *
            FROM `products`
            WHERE `id` = '{$itemId}'
            LIMIT 1";
    $rs = mysql_query($sql);
    return mysql_fetch_assoc($rs);
}

/**
 * Получить список продуктов из массива идентивикаторов ID's
 * 
 * @param array $itemsIds массив ИД
 * @return array массив продуктов
 */
function getProductsFromArray($itemsIds){
    $strIds = implode($itemsIds, ', ');
    //var_dump($strIds);
    $sql = "SELECT *
            FROM `products`
            WHERE `id` in ({$strIds})
           ";
    $rs = mysql_query($sql);
    //var_dump($rs);
    return createSmartyRsArray($rs);
}