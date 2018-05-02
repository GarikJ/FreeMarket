<h1>Профиль:</h1>
<table border="0">
    <tr>
        <td><form method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" value="Загрузить файл!">
            </form>
        </td>
        <td><img width="200" src="/images/users/{$nameImg['name']}"></td>
    </tr>
    <tr>
        <td>email</td>
        <td>{$arUser['email']}</td>
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
        <td>Bio</td>
        <td><textarea id="newBio" />{$arUser['bio']}</textarea></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAdress" />{$arUser['adress']}</textarea></td>
    </tr>
    <tr>
        <td>Новый пароль</td>
        <td><input type="password" id="newPass1" value="" /></td>
    </tr>
    <tr>
        <td>Повтор пароля</td>
        <td><input type="password" id="newPass2" value="" /></td>
    </tr>
    <tr>
        <td>Для того чтобы сохранить данные введите текущий пароль</td>
        <td><input type="password" id="curPass" value="" /></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="button" value="Сохранить изменения" onclick="updateUserData();" /></td>
    </tr>  
</table>