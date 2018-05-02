<?php
/* Smarty version 3.1.30, created on 2018-05-02 04:26:46
  from "D:\OpenServer\OSPanel\domains\freemarket\views\default\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae913d6619062_38712694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e02f5b4830bb2b90dd162b4a56fcff8abfcfdc05' => 
    array (
      0 => 'D:\\OpenServer\\OSPanel\\domains\\freemarket\\views\\default\\product.tpl',
      1 => 1525224395,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ae913d6619062_38712694 (Smarty_Internal_Template $_smarty_tpl) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProduct']->value, 'item', false, NULL, 'product', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
<!--<meta http-equiv="refresh" content="2"> можно добавить функцию удалить/добавить в кнопку и там же прикрутить обновление страницы--> 
<h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h3>

<img width="575" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
">
<div> Стоимость: <?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 </div>

<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme"<?php }?> href="#" onClick= "removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" alt="Удалить из корзины">Удалить из корзины</a>
<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme"<?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" alt="Добавить в корзину">Добавить в корзину</a>
<p> Описание <br /> </p><?php echo $_smarty_tpl->tpl_vars['item']->value['description'];?>


<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

<?php }
}
