{* шаблон главной сраницы *}

{foreach $rsProducts as $item name=products}
    {if empty($item['image'])}{$item['image'] = 'placeholder.png'}{/if}
    <div class="product">
        <a href="/product/{$item['id']}/">
            <img src="/image/{$item['image']}" width="100" /></a>
            <br />
        <a href="/product/{$item['id']}/">{$item['name']}</a>
    </div>
        {if $smarty.foreach.products.iteration mod 2 == 0}
            <div style="clear: both"></div>
        {/if}
{/foreach}
