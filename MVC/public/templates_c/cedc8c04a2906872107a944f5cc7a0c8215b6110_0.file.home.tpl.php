<?php
/* Smarty version 4.3.4, created on 2023-12-12 13:29:46
  from 'D:\wamp64\www\MVC\app\views\home.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6578604a977571_73659788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'cedc8c04a2906872107a944f5cc7a0c8215b6110' => 
    array (
      0 => 'D:\\wamp64\\www\\MVC\\app\\views\\home.tpl',
      1 => 1702387769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6578604a977571_73659788 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9759540276578604a961799_18294095', 'additional');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1296919526578604a9660a0_64822644', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9629421556578604a96df22_27055421', 'body');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16058114616578604a971d89_14679304', "component");
?>

    
<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)(defined('VIEW_TPL_PATH') ? constant('VIEW_TPL_PATH') : null))."/views/layout.tpl");
}
/* {block 'additional'} */
class Block_9759540276578604a961799_18294095 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'additional' => 
  array (
    0 => 'Block_9759540276578604a961799_18294095',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <form class="navbar-form navbar-left">
    <div class="form-group">
        <input type="text" class="form-control" name = "book_title" placeholder="Search For Book" v-model="sbook_title">
    </div>
    <button type="button" class="btn" style="margin-left: 4px;"  @click="search()">Search</button>
    </form>
<?php
}
}
/* {/block 'additional'} */
/* {block 'title'} */
class Block_1296919526578604a9660a0_64822644 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1296919526578604a9660a0_64822644',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Home<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_9629421556578604a96df22_27055421 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9629421556578604a96df22_27055421',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
    
        <!-- view all books -->
        <div class="container home-books">
            <h1><strong>BOOKS</strong></h1>
            <div class="row" v-for="(book, index) in books">
                <Book :book="book" :index="index" :page="page" @idx="(idx) => books.splice(idx, 1)"></Book>
            </div>
        </div>
    <?php echo '<script'; ?>
 type="module" src="http://localhost/MVC/app/views/js/home.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'body'} */
/* {block "component"} */
class Block_16058114616578604a971d89_14679304 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'component' => 
  array (
    0 => 'Block_16058114616578604a971d89_14679304',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php $_smarty_tpl->_subTemplateRender(((string)(defined('VIEW_TPL_PATH') ? constant('VIEW_TPL_PATH') : null))."/views/partials/book_component.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}
}
/* {/block "component"} */
}
