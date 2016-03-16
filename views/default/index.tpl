{* шаблон главной сраницы *}


<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5">
{foreach $rsProducts as $item name=products}
    {if empty($item['image'])}{$item['image'] = 'ph.jpg'}{/if}
    <li class="medium-text-center small-text-center">
        
        <a class="" href="/product/{$item['id']}/">
            <img class="" src="/image/{$item['image']}" /></a>
            <br />
        <a href="/product/{$item['id']}/">{$item['name']}</a><br />
        <a id="addCart_{$item['id']}" class="button expand" onClick="addToCart({$item['id']});return false;" href="#" alt="">В корзину</a>
        
    </li>
        
{/foreach}
</ul>

<a href="#" data-reveal-id="myModal">Click Me For A Modal</a>

<div id="myModal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <form>
      <div class="row column log-in-form">
        <h4 class="text-center">Авторизация</h4>
        <label>Email
          <input type="text" placeholder="somebody@example.com">
        </label>
        <label>Пароль
          <input type="password" placeholder="Password">
        </label>
        <p><a type="submit" class="button expand">Войти</a></p>
        <p class="text-center"><a href="#">Забыли пароль?</a></p>   
      </div>
    </form>


  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
