<?php
/**
 * 
 * Контроллер страницы продукта
 * 
 */

//подключаем модели
include_once '../models/ProductsModel.php';
//include_once '../models/CategoriesModel.php';

/**
 * Формирование страницы продукта
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if($itemId==null) exit();
    
    //получить данные продукта
    $rsProduct = getProductById($itemId); //loc: models/ProductModel.php
    
    //получить все категории
    //$rsCategories = getAllMainCatsWithChildren(); //loc: models/CategoriesModel.php
    
    //передаем в шаблонизатор флаг, имеется ли товар в корзине или нет
    $smarty->assign('itemInCart', 0);
    if(in_array($itemId, $_SESSION['cart'])){
        $smarty->assign('itemInCart',1);
    }
    
    $smarty->assign('pageTitle','');
    //$smarty->assign('rsCategories',$rsCategories);
    $smarty->assign('rsProduct',$rsProduct);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}
