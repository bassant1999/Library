<?php
/* Smarty version 4.3.4, created on 2023-12-12 14:56:46
  from 'D:\wamp64\www\MVC\app\views\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_657874ae4ac8d1_74099978',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '787b1f20d2ed7881a42e6ba708762a29bbd4f980' => 
    array (
      0 => 'D:\\wamp64\\www\\MVC\\app\\views\\login.tpl',
      1 => 1702393002,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657874ae4ac8d1_74099978 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_237935135657874ae4a8da5_14565545', 'title');
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1954118476657874ae4ab529_00306805', 'body');
?>

    

          


<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, ((string)(defined('VIEW_TPL_PATH') ? constant('VIEW_TPL_PATH') : null))."/views/layout.tpl");
}
/* {block 'title'} */
class Block_237935135657874ae4a8da5_14565545 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_237935135657874ae4a8da5_14565545',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Login<?php
}
}
/* {/block 'title'} */
/* {block 'body'} */
class Block_1954118476657874ae4ab529_00306805 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_1954118476657874ae4ab529_00306805',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

        <div class="container">
            <h2>LOGIN</h2>
            <form class="form-horizontal">
                <div class="alert alert-danger" v-if = "status">
                    <strong>Wrong Email or Password</strong> 
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="user_name">Email:</label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" name="user_name" v-model="user_name">
                </div>
                </div>
                <div class="form-group">
                <label class="control-label col-sm-2" for="password">Password:</label>
                <div class="col-sm-10">    
                    <input class="form-control" type="password" name="password" v-model="password">
                </div>
                </div>
                <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                    </div>
                </div>
                </div>
                <div class="form-group">        
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="button" @click="login()" value="Login" class="btn btn-default">                      
                </div>
                </div>
            </form>
        </div>            
    <div>
    <?php echo '<script'; ?>
 type="text/javascript" src="http://localhost/MVC/app/views/js/login.js"><?php echo '</script'; ?>
>  
<?php
}
}
/* {/block 'body'} */
}
