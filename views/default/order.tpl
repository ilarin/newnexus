{* страница оформления заказа *}
<div class="small-12 columns">
<h2>Данные заказа</h2>
<form id="frmOrder" action="/cart/saveorder/" method="POST">
    <table class="small-12" border="0">
        <thead>
        <tr>
            <th width="50">№</td>
            <th>Наименование</td>
            <th width="70">Кол-во</td>
            <th width="100" class="">Цена ед.</td>
            <th width="100">Сумма</td>
        </tr>
        </thead>
        <tbody>
            {$allPrice = 0}
            {foreach $rsProducts as $item name=products}
                
                {$allPrice = $allPrice + $item['realPrice']}
                <tr>
                    <td>{$smarty.foreach.products.iteration}</td>
                    <td><a href="/product/{$item['id']}/">{$item['name']}</td>
                    <td><span id="itemCnt_{$item['id']}">
                            <input type="hidden" name="itemCnt_{$item['id']}" value="{$item['cnt']}" />
                            {$item['cnt']}
                        </span></td>
                    <td><span id="itemPrice_{$item['id']}">
                            <input type="hidden" name="itemPrice_{$item['id']}" value="{$item['price']}" />
                            {$item['price']}
                        </span></td>
                    <td><span id="itemRealPrice_{$item['id']}">
                            <input type="hidden" name="itemRealPrice_{$item['id']}" value="{$item['realPrice']}" />
                            {$item['realPrice']}
                        </span></td>
                </tr>
            {/foreach}
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><b>Итого:</b></td>
                <td><b>{$allPrice}</b></td>
            </tr>
        </tbody>
    </table>
        {if isset($arUser)}
            {$buttonClass = ""}
            <h2>Данные заказчика</h2>
            <div id="orderUserInfoBox" class="{$buttonClass}">
                {$name = $arUser['name']}
                {$phone = $arUser['phone']}
                {$adress = $arUser['adress']}
                <table class="small-12" border="0">
                    <tr>
                        <td>Имя*</td>
                        <td><input type="text" id="name" name="name" value="{$name}" /></td>
                    </tr>
                    <tr>
                        <td>Тел*</td>
                        <td><input type="text" id="phone" name="phone" value="{$phone}" /></td>
                    </tr>
                    <tr>
                        <td>Адрес*</td>
                        <td><textarea id="adress" name="adress">{$adress}</textarea></td>
                    </tr>
                       
                </table>
            
            </div>
        {else}
            <p>
                Необходимо <a href="#" data-reveal-id="authModal">авторизоваться</a> или <a href="#" data-reveal-id="regModal">зарегистрироваться</a>.
            </p>
            
            {$buttonClass = "hideme"}
        {/if}
        <input class="{$buttonClass} button" id="btnSaveOrder" type="button" value="Оформить заказ" onclick="saveOrder();"/>
</form>
</div>