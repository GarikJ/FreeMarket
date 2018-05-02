<?php
/* Smarty version 3.1.30, created on 2018-05-02 04:08:33
  from "D:\OpenServer\OSPanel\domains\freemarket\views\default\user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae90f91832192_86936704',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '984f55388c80a964b5b1f04163fd12deb4916a3e' => 
    array (
      0 => 'D:\\OpenServer\\OSPanel\\domains\\freemarket\\views\\default\\user.tpl',
      1 => 1525223281,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae90f91832192_86936704 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1>Профиль:</h1>
<table border="0">
    <tr>
        <td><form method="post" enctype="multipart/form-data">
            <input type="file" name="file">
            <input type="submit" value="Загрузить файл!">
            </form>
        </td>
        <td><img width="200" src="/images/users/<?php echo $_smarty_tpl->tpl_vars['nameImg']->value['name'];?>
"></td>
    </tr>
    <tr>
        <td>email</td>
        <td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
    </tr>
    <tr>
        <td>Имя</td>
        <td><input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
" /></td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td><input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
" /></td>
    </tr>
    <tr>
        <td>Bio</td>
        <td><textarea id="newBio" /><?php echo $_smarty_tpl->tpl_vars['arUser']->value['bio'];?>
</textarea></td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td><textarea id="newAdress" /><?php echo $_smarty_tpl->tpl_vars['arUser']->value['adress'];?>
</textarea></td>
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
</table><?php }
}
