<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="ru" > <![endif]-->
<html class="no-js" lang="ru">
    <head>
        <meta name="keywords" content="keyword [, keyword]*" />
        <meta name="description" content="" />
        <meta http-equiv="k-ua-compatible" content="ie-edge" />
        <meta name="viewport" content="initial-scale=1.0, width=device-width">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

        <title>{$pageTitle}</title>
        
          <!-- If you are using the CSS version, only link these 2 files, you may add app.css to use for your overrides if you like -->
          <link rel="stylesheet" href="{$templateWebPath}css/normalize.css">
          <link rel="stylesheet" href="{$templateWebPath}css/foundation.css">
          <link rel="stylesheet" href="{$templateWebPath}css/foundation-icons.css">
          
          <link rel="stylesheet" type="text/css" href="{$templateWebPath}slick/slick.css"/>
            <link rel="stylesheet" type="text/css" href="{$templateWebPath}slick/slick-theme.css"/>
          
          <!-- If you are using the gem version, you need this only -->
          <link rel="stylesheet" href="{$templateWebPath}css/main.css">

          <script src="{$templateWebPath}js/vendor/modernizr.js"></script>



    </head>
    <body>
        <div id="regModal" class="reveal-modal small" data-reveal aria-labelledby="Окно авторизации" aria-hidden="true" role="dialog">
        <form id="registerBox">
          <div class="row column log-in-form">
            <h4 class="text-center">Регистрация</h4>
            <label>Email
              <input type="text" id="email" name="email" value="" placeholder="somebody@mail.ru" />
            </label>
            <label>Пароль
              <input id="pwd1" name="pwd1" value="" type="password" placeholder="Пароль" />
            </label>
             <label>Повторите пароль
              <input id="pwd2" name="pwd2" value="" type="password" placeholder="Повторите пароль" />
            </label>
            <p><a type="submit" class="button expand" onclick="registerNewUser();">Зарегистрироваться</a></p>
          </div>
        </form>


      <a class="close-reveal-modal" aria-label="Закрыть">&#215;</a>
    </div>
    <div id="authModal" class="reveal-modal small" data-reveal aria-labelledby="Окно авторизации" aria-hidden="true" role="dialog">
        <form>
          <div class="row column log-in-form">
            <h4 class="text-center">Авторизация</h4>
            <label>Email
              <input type="text" id="loginEmail" name="loginEmail" value="" placeholder="somebody@mail.ru" />
            </label>
            <label>Пароль
              <input id="loginPwd" name="loginPwd" value="" type="password" placeholder="Пароль" />
            </label>
            <p><a type="submit" class="button expand" onclick="login();">Войти</a></p>
            <p class="text-center"><a href="#" data-reveal-id="regModal">Регистрация</a></p>
            <p class="text-center"><a href="#">Забыли пароль?</a></p>   
          </div>
        </form>


      <a class="close-reveal-modal" aria-label="Закрыть">&#215;</a>
    </div>
        
        
        
        <div class="row">
        <header>
            <nav class="top-bar" data-topbar role="navigation">
                <ul class="title-area">
                    <li class="name"><!-- Leave this empty --></li>
                     <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
                    <li class="toggle-topbar menu-icon"><a href="#"><span>Меню</span></a></li>
                </ul>

                <section class="top-bar-section">
                <!-- Right Nav Section -->
                    <ul class="right">
                        <li class="has-dropdown">
                            <a href="#"><i class="fi-torso"></i></a>
                            <ul class="dropdown">
                                {if isset($arUser)}
                        <div id="userBox">
                        <li><a href="/user/" id="userLink">Профиль: {$arUser['displayName']}</a></li>
                        <li><a href="/user/logout/">Выйти</a></li>
                        </div>
                        {else}
                        <div id="userBox" class="hideme">
                            <li><a href="#" id="userLink"></a></li>
                            <li><a href="/user/logout/" onclick="logout();">Выход</a></li>
                        </div>
                        <div id="loginBox">
                        <li><a href="#" data-reveal-id="authModal">Войти</a></li>
                        </div>
                        {/if}
                            </ul>
                        </li>
                            
                        
                        </ul>
                    <ul class="right">
                        <li class="divider"></li>
                        <li>
                            <a href="/cart/">Моя корзина [<span id="cartCntItems">{if $cartCntItems >0}{$cartCntItems}{else}0{/if}</span>]</a></li>
                        <li class="divider"></li>
                        
                        
                    </ul>
                    

                <!-- Left Nav Section -->
                    <ul class="left">
                        <li><a href="#">О компании</a></li>
                        <li><a href="#">Направления</a></li>
                        <li><a href="#">Как купить?</a></li>
                        <li><a href="/category/">Каталог</a></li>
                        <li class="divider"></li>
                        
                        
                    </ul>
                </section>
            </nav>
        </header>
        </div>
        
            <div class="row">        
                <div class="small-4 medium-4 columns small-text-center medium-text-left" style="margin-top:20px;">
                    <p><a href="/"><img src="/image/newNexusLogo.png" alt="Логотип компании Nexus" width="100%"></a></p>
                </div>
                <div class="small-8 medium-4 small-text-right columns">
                    <p>
                    <ul class="no-bullet">
                        <li><i class="fi-telephone"> </i><a href="tel:88512611660">(8512)611-660</a></li>
                        <li><i class="fi-at-sign"> </i><a href="mailto:nexuscom@yandex.ru">nexuscom@yandex.ru</a></li>
                    </ul>
                    </p>
                </div>
                </div>
                <div class="row small-collapse" style="margin-top: 0px;">
                <div class="small-6 medium-6 columns">
                    <a href="#" class="button expand" style="margin:0;"><i class="fi-archive"> </i>Скачать прайс</a>
                </div>
                <div class="small-6 medium-6 columns">
                    <a href="#" class="button expand info" style="margin:0;"><i class="fi-web"> </i>Прайс-онлайн</a>
                </div>
                </div>
               
 


                
            
                                <div class="row" style="margin-top:16px;">
                                    <div class="small-12 columns" style="background:#008cba;">
                                        <input type="text" placeholder="Начните свой поиск здесь." style="margin-top:16px;" />
                                    </div>
                                </div>
         
                             
            
        
                                <div class="row">
            
