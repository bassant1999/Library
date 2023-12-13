<?php
/* Smarty version 4.3.4, created on 2023-12-12 08:42:29
  from 'D:\wamp64\www\MVC\app\views\404.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65781cf54803c4_34837025',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0729ab20261abad63e712c68d336786e413448ac' => 
    array (
      0 => 'D:\\wamp64\\www\\MVC\\app\\views\\404.tpl',
      1 => 1702370406,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65781cf54803c4_34837025 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11958423465781cf5477295_50522503', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_43897385165781cf547cee0_56874290', 'body');
?>

    

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)(defined('VIEW_TPL_PATH') ? constant('VIEW_TPL_PATH') : null))."/views/layout.tpl");
}
/* {block 'title'} */
class Block_11958423465781cf5477295_50522503 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11958423465781cf5477295_50522503',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Error<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_43897385165781cf547cee0_56874290 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_43897385165781cf547cee0_56874290',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h1>View file not found</h1>
    </div>
<?php
}
}
/* {/block 'body'} */
}
