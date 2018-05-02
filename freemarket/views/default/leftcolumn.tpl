<div id="leftColumn">

<div id="leftMenu">
<div class="menuCaption">Menu:</div>
    {foreach $rsCategories as $item}
        <a href="/?controller=category&id={$item['id']}">{$item['name']}</a><br>

            {if isset($item['children'])}
                {foreach $item['children'] as $itemChild}
                    ==<a href="/?controller=category&id={$itemChild['id']}">{$itemChild['name']}</a><br>
                {/foreach}
            {/if}
    {/foreach}
         
    </div>
        {if isset($arUser)}
        <div id="userBox" >
            <a href="/user/" id="userLink">{$arUser['displayName']}</a><br />
            <a href="/logout.php/" >Выход</a>
        </div>
        {else}

        <div id="userBox" class="hideme">
            <a href="#" id="userLink"></a><br />
            <a href="/logout.php/" >Выход</a>
        </div>

        <div id="loginBox">
            <div class="menuCaption">Авторизация</div>
            <input type="text" id="loginName" name="loginName" value=""><br />
            <input type="password" id="loginPass" name="loginPass" value=""><br />
            <input type="button" onclick="login();" value="Войти">
        </div>

        <div id="registerBox">
            <div class="menuCaption showHidden" onclick="showRegisterBox();"> Регистрация </div>
            <div id="registerBoxHidden">
                ФИО: <br />
                <input type="text" id="name" name="name" value=""/><br />
                email: <br />
                <input type="text" id="email" name="email" value=""/><br />
                пароль: <br />
                <input type="password" id="pass1" name="pass1" value=""/><br />
                повторить пароль: <br />
                <input type="password" id="pass2" name="pass2" value=""/><br />
                <input type="button" onclick="registerNewUser();" value="Зарегестрироваться" />
            </div>       
        </div>
        {/if}

        <div class="menuCaption">Корзина</div>
            <a href="/cart/" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems">
            {if $cartCntItems > 0}{$cartCntItems}{else}пусто{/if}
        </span>


        </div>