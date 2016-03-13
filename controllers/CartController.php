<?php
/**
 * Контроллер работы с корзиной
 */

//подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Добавление продукта в корзину
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
