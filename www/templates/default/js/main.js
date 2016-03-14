/**
 * Добавление в корзину
 * @param {integer} itemId
 * @returns обновляем количество в корзине, скрываем добавить в корзину, показываем удалить из корзины
 */
function addToCart(itemId){
    console.log("js = addToCart()");
    $.ajax({
        type: 'POST',
        async: false,
        url: "/cart/addtocart/" + itemId + '/',//POST запрос к функции removefromcart контроллера cart
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#cartCntItems').html(data['cntItems']);
                $('#cartLineItem_' + itemId).fadeTo(300,1);// установить видимость элемента 100%
                $('#addCart_' + itemId).hide();//скрыть элемент
                $('#removeCart_' + itemId).show();//показать элемент                
            }
        }
    });
}
/**
 * Удаление из корзины
 * @param {integer} itemId
 * @returns обновляем количество в корзине, скрываем удалить из корзины, показываем добавит в корзину
 */
function removeFromCart(itemId){
    console.log("js = removeFromCart");
    $.ajax({
       type: 'POST',
       async: false,
       url: "/cart/removefromcart/" + itemId + '/',//POST запрос к функции removefromcart контроллера cart
       dataType: 'json',
       success: function(data){
           if(data['success']){
               $('#cartCntItems').html(data['cartCntItems']);
               $('#cartLineItem_' + itemId).fadeTo(300,0.33);// установить видимость элемента 33%
               $('#addCart_' + itemId).show();//показать элемент
               $('#removeCart_' + itemId).hide();//скрыть элемент               
           }
       }
    });
}

/**
 * Подсчет стоимости купленного товара
 * @param {integer} itemId ид продукта
 */
function conversionPrice(itemId){
    var newCnt = $('#itemCnt_' + itemId).val();//получить значение элемента ввода
    var itemPrice = $('#itemPrice_' + itemId).attr('value'); //получить значение атрибута value
    var realItemPrice = newCnt * itemPrice;
    
    $('#itemRealPrice_' + itemId).html(realItemPrice);
}