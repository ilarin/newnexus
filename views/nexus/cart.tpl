
{* шаблон страницы корзины *}
<h1>Корзина продуктов</h1>
{if !$rsProducts}
В корзине пусто
{else}
    <h2>Данные заказа</h2>
    <table class="medium-12">
        <thead>
        <tr>
            <th width="50">№</td>
            <th>Наименование</td>
            <th width="70">Кол-во</td>
            <th width="70">Цена</td>
            <th width="70">Сумма</td>
            <th width="100">Действие</td>
        </tr>
        </thead>
        <tbody>
        {foreach $rsProducts as $item name=products}
            <tr id="cartLineItem_{$item['id']}">
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
                <td><input style="margin:0;" name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onChange="conversionPrice({$item['id']});" /> </td>
                <td>
                    <span id="itemPrice_{$item['id']}" value="{$item['price']}">
                        {$item['price']}
                    </span>
                </td>
                <td>
                    <span id="itemRealPrice_{$item['id']}">
                        {$item['price']}
                    </span>
                </td>
                <td>
                    <a id="addCart_{$item['id']}" class="tiny button hideme" style="margin:0;" onClick="addToCart({$item['id']});return false;" href="#">Вернуть</a>
                    <a id="removeCart_{$item['id']}" class="tiny button alert" style="margin:0;" onClick="removeFromCart({$item['id']});return false;" href="#">Удалить</a>

                </td>
            </tr>
        {/foreach}
        </tbody>
    </table>
{/if}