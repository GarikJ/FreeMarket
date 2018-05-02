<?php
/* Smarty version 3.1.30, created on 2018-05-02 04:03:24
  from "D:\OpenServer\OSPanel\domains\freemarket\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae90e5c63b703_15936011',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '38d0f0dc1146c3fc614192ce2d1f1c3ec24bbfa6' => 
    array (
      0 => 'D:\\OpenServer\\OSPanel\\domains\\freemarket\\views\\default\\header.tpl',
      1 => 1525222866,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5ae90e5c63b703_15936011 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
    <head>
        <meta charset="utf-8">
        <title> <?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
 </title>
        <link href="<?php echo $_smarty_tpl->tpl_vars['TemplateWebPath']->value;?>
/css/main.css" rel="stylesheet" type="text/css"> 
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery.js"><?php echo '</script'; ?>
>
        <?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>
    </head>
<body>
    <div id="header">
        <h1>FreeMarket</h1>
    </div>

    <?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <div id="centerColumn"><?php }
}
