<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="ru" > <![endif]-->
<html class="no-js" lang="ru">
    <head>
        <meta http-equiv="k-ua-compatible" content="ie-edge" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <meta name="keywords" content="keyword [, keyword]*" />
        <meta name="description" content="" />
        <title>{$pageTitle}</title>
        
          <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
          <link rel="stylesheet" href="{$templateWebPath}css/normalize.css">
          <link rel="stylesheet" href="{$templateWebPath}css/foundation.css">

          <!-- If you are using the gem version, you need this only -->
          <link rel="stylesheet" href="{$templateWebPath}css/main.css">

          <script src="{$templateWebPath}js/vendor/modernizr.js"></script>



    </head>
    <body>
        
        <div class="row">
        <header>
            <nav class="top-bar" data-topbar role="navigation">
                <ul class="title-area">
                    <li class="name">
                        <h1><a href="/">NewNexus</a></h1>
                    </li>
                     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Меню</span></a></li>
                </ul>

                <section class="top-bar-section">
                <!-- Right Nav Section -->
                    <ul class="right">
                        <li class="">
                            <a href="/cart/">Моя корзина [<span id="cartCntItems">{if $cartCntItems >0}{$cartCntItems}{else}0{/if}</span>]</a></li>
                        <li class="has-dropdown not-click">
                            <a href="#">Right Button Dropdown</a>
                            <ul class="dropdown">
                                <li><a href="#">First link in dropdown</a></li>
                                <li class="active"><a href="#">Active link in dropdown</a></li>
                            </ul>
                        </li>
                    </ul>

                <!-- Left Nav Section -->
                    <ul class="left">
                        
                        <li class="has-dropdown not-click">
                        
                            <a href="#">Каталог</a>
                            <ul class="dropdown">
                                
                                {foreach $rsCategories as $item}
                                    <li class="{if isset($item['children'])}has-dropdown{/if} not-click"><a href="/category/{$item['id']}/">{$item['name']}</a>
                    
                                    {if isset($item['children'])}
                                        <ul class="dropdown">
                                        {foreach $item['children'] as $itemChild}
                                            <li class=""><a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a></li>
                                        {/foreach}
                                        </ul>
                                    {/if}
                                    </li>
                                {/foreach}
                                
                            </ul>
                        
                        </li>
                        <li class="has-form">
                          <div class="row collapse">
                            <div class="large-8 small-9 columns">
                              <input type="text" placeholder="Что-то ищем?">
                            </div>
                            <div class="large-4 small-3 columns">
                              <a href="#" class="success button expand">Поиск</a>
                            </div>
                          </div>
                        </li>
                    </ul>
                </section>
            </nav>
        </header>
        </div>
        
            <div class="row">        
                <div class="small-12 columns small-text-center">
                       <img src="http://placehold.it/450x183&amp;text=LOGO" alt="company logo">
                </div>
                <div class="small-12 columns small-text-center">
                    <img src="http://placehold.it/900x175&amp;text=Responsive Ads - ZURB Playground/333" alt="advertisement for deep fried Twinkies">
                </div>
            </div>
            
        
        <div class="row">
        
        
        <div class="small-12 column">
            
