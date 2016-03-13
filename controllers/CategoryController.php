<?php
/**
 * Контролер страницы категории
 */

//подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * формирование страницы категории
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if($catId==null) exit();
    
    $rsChildCats = null;
    $rsProducts = null;
    
    $rsCategory = getCatById($catId);
    //echo $catId;
    //var_dump($smarty);
    //var_dump($rsCategory);
    if($rsCategory['parent_id'] == 0){
        $rsChildCats = getChildrenForCat($catId);
        //var_dump($rsChildCats);
    }
    else {
        $rsProducts = getProductsByCat($catId);
        //var_dump($rsProducts);
    }
    $rsCategories = getAllMainCatsWithChildren();
    
    $smarty->assign('pageTitle','Товары категории' . $rsCategory['name']);
    $smarty->assign('rsCategory',$rsCategory);
    $smarty->assign('rsProducts',$rsProducts);
    $smarty->assign('rsChildCats',$rsChildCats);
    $smarty->assign('rsCategories',$rsCategories);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}