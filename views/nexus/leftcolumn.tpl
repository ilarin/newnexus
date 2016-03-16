<div id="leftColumn" class="small-12  column">
            <div id="leftMenu">
                <div class="menuCaption">Меню:</div>
                
            </div>

            {if isset($arUser)}
            <div id="userBox">
                <a href="/user/" id="userLink">{$arUser['displayName']}</a><br />
                <a href="/user/logout/" onclick="logout();">Выход</a>
            </div>
            {else}
            <div id="userBox" class="hideme">
                <a href="#" id="userLink"></a><br />
                <a href="/user/logout/" onclick="logout();">Выход</a>
            </div>
            
            <div id="loginBox">
                <div class="menuCaption">Авторизация</div>
                <input type="text" id="loginEmail" name="loginEmail" value="" />
                <input type="password" id="loginPwd" name="loginPwd" value="" />
                <input type="button" onclick="login();" value="Войти" />
            </div>
            
            <div id="registerBox">
                <div id="registerSrc" class="menuCaption showHidden" onclick="showRegisterBox();">Регистрация</div>
                <div id="registerBoxHidden">
                    email<br />
                    <input type="text" id="email" name="email" value="" />
                    пароль<br />
                    <input type="password" id="pwd1" name="pwd1" value="" />
                    повторить пароль<br />
                    <input type="password" id="pwd2" name="pwd2" value="" />
                    <input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />
                </div>
            </div>
            {/if}
            
            
            <div class="menuCaption">Корзина</div>
            <a href="/cart/" title="Перейти в корзину">В корзине</a>
            <span id="cartCntItems">
                {if $cartCntItems >0}{$cartCntItems}{else}пусто{/if}
            </span>
        </div>
