
{* шаблон страницы корзины *}
<h1>Корзина продуктов</h1>
{if !$rsProducts}
В корзине пусто
{else}
    <h2>Данные заказа</h2>
    <table>
        <tr>
            <td>№</td>
            <td>Наименование</td>
            <td>Кол-во</td>
            <td>Цена</td>
            <td>Сумма</td>
            <td>Действие</td>
        </tr>
        {foreach $rsProducts as $item name=products}
            <tr id="cartLineItem_{$item['id']}">
                <td>{$smarty.foreach.products.iteration}</td>
                <td><a href="/product/{$item['id']}/">{$item['name']}</a></td>
                <td><input name="itemCnt_{$item['id']}" id="itemCnt_{$item['id']}" type="text" value="1" onChange="conversionPrice({$item['id']});" /> </td>
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
                    <a id="addCart_{$item['id']}" class="hideme" onClick="addToCart({$item['id']});return false;" href="#" alt="">Вернуть</a>
                    <a id="removeCart_{$item['id']}" onClick="removeFromCart({$item['id']});return false;" href="#" alt="">Удалить</a>

                </td>
            </tr>
        {/foreach}
    </table>
{/if}