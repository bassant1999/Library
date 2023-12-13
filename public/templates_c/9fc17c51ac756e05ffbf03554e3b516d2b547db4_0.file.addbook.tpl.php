<?php
/* Smarty version 4.3.4, created on 2023-12-12 08:41:49
  from 'D:\wamp64\www\MVC\app\views\addbook.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65781ccd367be1_92874086',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fc17c51ac756e05ffbf03554e3b516d2b547db4' => 
    array (
      0 => 'D:\\wamp64\\www\\MVC\\app\\views\\addbook.tpl',
      1 => 1702370418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65781ccd367be1_92874086 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_22744027365781ccd364158_35397446', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_130036910065781ccd365c44_59467199', 'body');
?>

    










<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)(defined('VIEW_TPL_PATH') ? constant('VIEW_TPL_PATH') : null))."/views/layout.tpl");
}
/* {block 'title'} */
class Block_22744027365781ccd364158_35397446 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_22744027365781ccd364158_35397446',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
ADD<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_130036910065781ccd365c44_59467199 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_130036910065781ccd365c44_59467199',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div>
      <form class="form-horizontal">
        <div class="alert alert-success" v-if = "success_msg == 1">
          <strong>Added Successfully</strong> 
        </div>
        <div class="alert alert-info" v-if = "success_msg == 2">
          <strong>Fill All The Fields</strong>.
        </div>
        <div class="alert alert-info" v-if = "success_msg == 3">
          <strong>Something went wrong. Try Again!</strong>.
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="title">Title:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="title" v-model="title" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="author">Author:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="author" v-model="author">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="description">Description:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="description" v-model="description" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="img_url">Image Url:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="img_url" v-model="img_url" >
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-2" for="max_num">Available number of books:</label>
          <div class="col-sm-10">
            <input class="form-control" type="text" name="max_num" v-model="max_num" >
          </div>
        </div>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <input type="button" @click="add_book()" value="Add" class="btn btn-default">                     
          </div>
        </div>
      </form>
    </div>
  </div>
  <?php echo '<script'; ?>
 type="text/javascript" src="http://localhost/MVC/app/views/js/add_book.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block 'body'} */
}
