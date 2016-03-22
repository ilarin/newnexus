{* шаблон главной сраницы *}
<div class="small-12 columns">
<div class="row" style="margin-top: 16px;margin-bottom: 16px;">

    <div class="small-6 columns">
    
        <div><h4>Хиты продаж</h4></div>
    
    </div>
    <div class="small-6 columns small-text-right">
        <a href=""><h4>Показать все</h4></a>
    </div>
    <hr />

</div>

<div class="sliderProduct" data-equalizer >
{foreach $rsProducts as $item name=products}
    {if empty($item['image'])}{$item['image'] = 'ph.jpg'}{/if}
    <div class="sliderPro" style="" data-equalizer-watch>
        
        
        
          <a id="addCart_{$item['id']}" class="button expand" onClick="addToCart({$item['id']});return false;">В корзину</a>
          <a href="/product/{$item['id']}/"><img src="/image/{$item['image']}"></a>
        
        <a href="/product/{$item['id']}/"><h3>{$item['name']}</h3></a>
        <h5>{$item['price']} р.</h5>
        
      
        
    </div>
        
{/foreach}
</div>
</div>







