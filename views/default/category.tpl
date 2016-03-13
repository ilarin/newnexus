{* шаблон страницы категории *}

<h1>Товары категории {$rsCategory['name']}</h1>
{foreach $rsChildCats as $item name=childCats}
    <h2><a href="/category/{$item['id']}/">{$item['name']}</a></h2>
{/foreach}

{foreach $rsProducts as $item name=products}
    <div class="product">
        <a href="/product/{$item['id']}/">
            <img src="/image/{$item['image']}" width="100" />
        </a><br />
        <a href="/product/{$item['id']}/">{$item['name']}</a>
    </div>
        {if $smarty.foreach.products.iteration mod 2 == 0}
            <div style="clear: both"></div>
        {/if}
{foreachelse}
    {if empty($rsChildCats)}
    <p>Товары не найдены</p>
    {/if}
{/foreach}
