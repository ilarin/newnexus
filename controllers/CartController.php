<?php
/**
 * Контроллер работы с корзиной
 */

//подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Формирование страницы корзины
 * @param object $smarty шаблонизатор
 * @link /cart/ урл страницы корзины
 */
function indexAction($smarty){
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    
    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemsIds);
    //var_dump($rsProducts);
    $smarty->assign('pageTitle','Корзина товаров');
    $smarty->assign('rsCategories',$rsCategories);
    $smarty->assign('rsProducts',$rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}
/**
 * Добавление продукта в корзину AJAX
 * 
 * @param integer id GET параметр - ID добавляемого продукта
 * @return json информация об операции(успех, количество элементов в корзине
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if(!$itemId) return false;
    
    $resData = array();
    
    if(isset($_SESSION['cart']) && array_search($itemId,$_SESSION['cart']) === false){
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    }
    else {
        $resData['success'] = 0;
    }
    
    echo json_encode($resData);
}

/**
 * Удаление продукта из корзины AJAX
 * @param integer $_GET['id'] ИД удаляемого продукта
 * @return json инф об (успех, количество элементов в корзине)
 */
function removefromcartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if($itemId == null) exit ();
    
    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if($key !== false){
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cartCntItems'] = count($_SESSION['cart']);
    }
    else {
        $resData['success'] = 0;
    }
    echo json_encode($resData);
}
