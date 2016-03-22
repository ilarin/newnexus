{*  *}
<div class="small-12 columns">
    <table class="small-12" border="0">
        <tbody>
            <tr>
                <td>Логин (email)</td>
                <td width="300">{$arUser['email']}</td>
            </tr>
            <tr>
                <td>Имя</td>
                <td><input type="text" id="newName" value="{$arUser['name']}" /></td>
            </tr>
            <tr>
                <td>Телефон</td>
                <td><input type="text" id="newPhone" value="{$arUser['phone']}" /></td>
            </tr>
            <tr>
                <td>Адрес</td>
                <td><textarea id="newAdress">{$arUser['adress']}</textarea></td>
            </tr>
            <tr>
                <td>Новый пароль</td>
                <td><input type="password" id="newPwd1" value="" /></td>
            </tr>
            <tr>
                <td>Повтор пароля</td>
                <td><input type="password" id="newPwd2" value="" /></td>
            </tr>
            <tr>
                <td>Чтобы сохранить данные, введите текущий пароль</td>
                <td><input type="password" id="curPwd" value="" /></td>
            </tr>
            <tr>
                <td>&nbsp;</td>
                <td><input class="button expand" type="button" value="Сохранить изменения" onclick="updateUserData();" /></td>
            </tr>
        </tbody>
    </table>
</div>