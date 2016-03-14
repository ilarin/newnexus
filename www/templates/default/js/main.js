/**
 * Добавление в корзину
 * @param {integer} itemId
 * @returns обновляем количество в корзине, скрываем добавить в корзину, показываем удалить из корзины
 */
function addToCart(itemId){
    //console.log("js = addToCart()");
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
    //console.log("js = removeFromCart");
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

/**
 * 
 * @param {type} obj_form
 * @returns {array}
 */
function getData(obj_form){
    var hData = {};
    $('input,textarea,select', obj_form).each(function(){
        if(this.name && this.name != ''){
            hData[this.name] = this.value;
            console.log('hData[' + this.name + '] = ' + hData[this.name]);
        }
    });
    return hData;
}
/**
 * 
 * @returns {undefined}
 */
function registerNewUser(){
    var postData = getData('#registerBox');
    $.ajax({
        type: 'POST',
        async: false,
        url: "/user/register/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                alert('Регистрация прошла успешно');
                
                $('#registerBox').hide();
                
                $('#userLink').attr('href','/user/');
                $('#userLink').html(data['userName']);
                $('#userBox').show();
                
                $('#loginBox').hide();
                $('#btnSaveOrder').show();
            }
            else {
                alert('что то пошлло не так...');
            }
        }
    });
}

/**
 * Авторизация пользователя
 * @returns {undefined}
 */
function login(){
    var email = $('#loginEmail').val();
    var pwd = $('#loginPwd').val();
    
    var postData = "email="+ email +"&pwd="+ pwd;
    
    $.ajax({
        type: 'POST',
        asunc: false,
        url: "/user/login/",
        data: postData,
        dataType: 'json',
        success: function(data){
            if(data['success']){
                $('#registerBox').hide();
                $('#loginBox').hide();
                
                $('#userLink').attr('href','/user/');
                $('#userLink').html(data['displayName']);
                $('#userBox').show();
            }
            else {
                alert(data['message']);
            }
        }
    });
    
}

function showRegisterBox(){
    //if($('#registerBoxHidden').hasClass('hideme')){
    //    $('#registerBoxHidden').removeClass('hideme');
    //    $('#registerSrc').removeClass('showHidden');
    //}
    //else {
    //    $('#registerBoxHidden').addClass('hideme');
    //    $('#registerSrc').addClass('showHidden');
    //}
    if($('#registerBoxHidden').css('display') != 'block'){
        $('#registerBoxHidden').show();
    } else {
        $('#registerBoxHidden').hide();
        
    }
}