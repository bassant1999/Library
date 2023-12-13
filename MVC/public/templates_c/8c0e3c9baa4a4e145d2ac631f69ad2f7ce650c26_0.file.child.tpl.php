<?php
/* Smarty version 4.3.4, created on 2023-12-11 15:01:04
  from 'D:\wamp64\www\MVC\app\views\child.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6577243023f858_12303725',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8c0e3c9baa4a4e145d2ac631f69ad2f7ce650c26' => 
    array (
      0 => 'D:\\wamp64\\www\\MVC\\app\\views\\child.tpl',
      1 => 1702306841,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6577243023f858_12303725 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_211126460465772430230741_13677771', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17889120486577243023aee2_87150056', 'body');
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "parent.tpl");
}
/* {block 'title'} */
class Block_211126460465772430230741_13677771 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_211126460465772430230741_13677771',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
My Title<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_17889120486577243023aee2_87150056 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17889120486577243023aee2_87150056',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
My Body<?php
}
}
/* {/block 'body'} */
}
