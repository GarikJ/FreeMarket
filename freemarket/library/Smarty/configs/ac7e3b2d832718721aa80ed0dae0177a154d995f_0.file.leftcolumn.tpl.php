<?php
/* Smarty version 3.1.30, created on 2018-05-02 04:20:42
  from "D:\OpenServer\OSPanel\domains\freemarket\views\default\leftcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae9126aaec2c2_17769552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac7e3b2d832718721aa80ed0dae0177a154d995f' => 
    array (
      0 => 'D:\\OpenServer\\OSPanel\\domains\\freemarket\\views\\default\\leftcolumn.tpl',
      1 => 1525224027,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae9126aaec2c2_17769552 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="leftColumn">

<div id="leftMenu">
<div class="menuCaption">Menu:</div>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
        <a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br>

            <?php if (isset($_smarty_tpl->tpl_vars['item']->value['children'])) {?>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
?>
                    ==<a href="/?controller=category&id=<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a><br>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

            <?php }?>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

         
    </div>
        <?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
        <div id="userBox" >
            <a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
            <a href="/logout.php/" >Выход</a>
        </div>
        <?php } else { ?>

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
        <?php }?>

        <div class="menuCaption">Корзина</div>
            <a href="/cart/" title="Перейти в корзину">В корзине</a>
        <span id="cartCntItems">
            <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {
echo $_smarty_tpl->tpl_vars['cartCntItems']->value;
} else { ?>пусто<?php }?>
        </span>


        </div><?php }
}
