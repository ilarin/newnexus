<?php

/**
 * Модель для таблицы категорий (categories)
 */

/**
 * Получить дочернии категории для категории $catId
 * 
 * @param integer $catId ID категории
 * @return array массив дочерних категорий
 */
function getChildrenForCat($catId){
    $sql = "SELECT *
            FROM `categories`
            WHERE `parent_id` = '{$catId}'";
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs); //loc: library/MainFunctions.php
}



/**
 * Получить главные категории с привязками дочерних
 * @return array массив категорий
 * WHERE `parent_id` = ''
 
function getAllMainCatsWithChildren(){
    $sql = "SELECT *
            FROM `categories`
            WHERE `parent_id` = '0'"; 
    $rs = mysql_query($sql);
    
    $smartyRs = array();
    $pid['level'] = $level = 0;
    while($row = mysql_fetch_assoc($rs)){
        $rsChildren = getChildrenForCat($row['id']); //loc: models/CategoriesModel.php
        //var_dump($rsChildren);
        if($rsChildren){
            $row['children'] = $rsChildren;
        }
        $smartyRs[] = $row;
    }
    
    return $smartyRs;
}
*/

function getAllMainCatsWithChildren(){
 
    
    $sql = "SELECT *
            FROM `categories`
            "; 
    $rs = mysql_query($sql);

    $levels = array();
    $tree = array();
    $cur = array();
   
    while($rows = mysql_fetch_assoc($rs)){
       
        $cur = &$levels[$rows['id']];
        $cur['parent_id'] = $rows['parent_id'];
        $cur['name'] = $rows['name'];
       
        if($rows['parent_id'] == 0){
            $tree[$rows['id']] = &$cur;
        }
        else{
            $levels[$rows['parent_id']]['children'][$rows['id']] = &$cur;
        }
       
    }
    return $tree;
   //var_dump($tree);

}
/**
 * Получить главные категории с привязками дочерних
 * @return array массив категорий
 * WHERE `parent_id` = ''
 
function getAllMainCatsWithChildren(){
    $sql = "SELECT *
            FROM `categories`
            "; 
    $rs = mysql_query($sql);
    $raw = array();
  while( $item = mysql_fetch_assoc( $rs ) ){
    $item['children'] = array();
    $raw[ $item['id'] ] = $item;
    }
  // строим само дерево
  $tree = array();
  foreach( $raw as $id=>&$item )
    if( array_key_exists( $item['parent_id'], $raw )  )  // если есть родительская вершина в дереве
      $raw[ $item['parent_id'] ]['children'][ $id ] =& $item;
    else // иначе - это вершина верхнего уровня
      $tree[ $id ] =& $item;
    
   //var_dump($tree);
   return $tree;

}
*/
/**
 * Получение данные категории по ее ИД
 * 
 * @param integer $catId ID категории
 * @return array массив - строка категории
 */
function getCatById($catId){
    
    $catId = intval($catId);
    
    $sql = "SELECT *
            FROM `categories`
            WHERE
            `id` = '{$catId}'";
            
    $rs = mysql_query($sql);
    
    return mysql_fetch_assoc($rs);
}
