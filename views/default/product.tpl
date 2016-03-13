{* страница продукта *}
<h3>{$rsProduct['name']}</h3>

<img src="/images/{$rsProduct['image']}">
Стоимость: {$rsProduct['price']}

<a id="addCart_{$rsProduct['id']}}" onClick="addToCart({$rsProduct['id']});return false;" href="#" alt="">Добавить в корзину</a>
<p>Описание<br />{$rsProduct['description']}</p>