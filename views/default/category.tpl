{* шаблон страницы категории *}

   
    
    
    <div class="small-12 medium-12 columns">
<h2>Товары категории {$rsCategory['name']}</h1>
<ul class="small-block-grid-2">
{foreach $rsChildCats as $item name=childCats}
    <li><a href="/category/{$item['id']}/"><img src="/image/placeholder.png"><br />{$item['name']}</a></li>
    
{/foreach}
</ul>
<div class="row">
    <ul class="small-block-grid-2 small-text-center">
{foreach $rsProducts as $item name=products}
    {if empty($item['image'])}{$item['image'] = 'ph.jpg'}{/if}
    <li>
        <a href="/product/{$item['id']}/">
            <img src="/image/{$item['image']}" /></a>
        <br />
        <a href="/product/{$item['id']}/">{$item['name']}</a>
    </li>

{foreachelse}
    {if empty($rsChildCats)}
    <p>Товары не найдены</p>
    {/if}
{/foreach}
</ul>
</div>
</div>