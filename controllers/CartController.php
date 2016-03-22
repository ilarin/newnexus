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
    
    //$rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemsIds);
    //var_dump($rsProducts);
    $smarty->assign('pageTitle','Корзина товаров');
    //$smarty->assign('rsCategories',$rsCategories);
    $smarty->assign('rsProducts',$rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}
/**
 * 
 * @param type $smarty
 */
function orderAction($smarty){
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    if(! $itemsIds){
        redirect('/cart/');
        return;
    }
    $itemsCnt = array();
    
    foreach ($itemsIds as $item){
        $postVar = "itemCnt_{$item}";
        //echo $postVar;
        $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }
    //var_dump($itemsCnt);
    $rsProducts = getProductsFromArray($itemsIds);
    
    $i=0;
    foreach ($rsProducts as &$item){
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if($item['cnt']){
            $item['realPrice'] = $item['cnt'] * $item['price'];
        }else{
            unset($rsProducts[$i]);
        }
        $i++;
    }
    
    if(!$rsProducts){
        echo 'Корзина пуста!';
        return;
    }
    
    $_SESSION['saleCart'] = $rsProducts;
    
    if(!isset($_SESSION['user'])){
        $smarty->assign('hideLoginBox',1);
    }
    
    $smarty->assign('pageTitle','');
    $smarty->assign('rsProducts',$rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
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

function saveorderAction(){
    
}