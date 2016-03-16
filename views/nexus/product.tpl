{* страница продукта *}
<h3>{$rsProduct['name']}</h3>
{if empty($rsProduct['image'])}{$rsProduct['image'] = 'placeholder.png'}{/if}
<img src="/image/{$rsProduct['image']}">
Стоимость: {$rsProduct['price']}

<a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if} onClick="addToCart({$rsProduct['id']});return false;" href="#" alt="">Добавить в корзину</a>
<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart}class="hideme"{/if} onClick="removeFromCart({$rsProduct['id']});return false;" href="#" alt="">Удалить из корзины</a>
<p>Описание<br />{$rsProduct['description']}</p>