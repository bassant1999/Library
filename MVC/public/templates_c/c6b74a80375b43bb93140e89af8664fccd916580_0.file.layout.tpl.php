<?php
/* Smarty version 4.3.4, created on 2023-12-13 12:20:48
  from 'D:\wamp64\www\MVC\app\views\layout.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_6579a1a0e88297_89195702',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c6b74a80375b43bb93140e89af8664fccd916580' => 
    array (
      0 => 'D:\\wamp64\\www\\MVC\\app\\views\\layout.tpl',
      1 => 1702468904,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6579a1a0e88297_89195702 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
    <head>
        <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9718916346579a1a0e739a5_60493182', 'title');
?>
</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.0/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['ROOT']->value;?>
/assets/css/style.css">
        <?php echo '<script'; ?>
 src="https://unpkg.com/vue@3/dist/vue.global.js"><?php echo '</script'; ?>
>
    </head>
    <body>
        <div id="app">
            <!-- header -->
            <header>
                <nav class="navbar navbar-inverse">
                    <div class="container-fluid">
                        <div class="navbar-header">
                        <a class="navbar-brand">Library</a>
                        </div>
                        <ul class="nav navbar-nav">
                        <li :class="{ active: whoActive == 0 }"><a href="http://localhost/MVC/public/">Home</a></li>
                       
                        <?php if (!(isset($_smarty_tpl->tpl_vars['login']->value)) || $_smarty_tpl->tpl_vars['login']->value == 0) {?>
                            <li :class="{ active: whoActive == 1 }"><a href="http://localhost/MVC/public/pages/login/login_view">Login</a></li>
                        <?php } elseif ($_smarty_tpl->tpl_vars['login']->value == 1 && $_smarty_tpl->tpl_vars['user_type']->value == 0) {?>
                            <li :class="{ active: whoActive == 2 }"><a  href="http://localhost/MVC/public/pages/addbook/add_book_view">Add Book</a></li>
                            <li><a href="http://localhost/MVC/public/services/logout">Logout</a></li>
                        <?php } else { ?>
                            <li :class="{ active: whoActive == 3 }"><a @click="borrowed_books()">Borrowed Books</a></li>
                            <li><a href="http://localhost/MVC/public/services/logout">Logout</a></li>
                        <?php }?>
                        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16616446056579a1a0e82cb7_36272041', "additional");
?>

                        </ul>
                        
                    </div>
                </nav>
            </header>      
            <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17554878656579a1a0e84958_99581535', 'body');
?>
 
        </div>   
        <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12607279586579a1a0e866e9_75897832', 'component');
?>

    </body>
</html><?php }
/* {block 'title'} */
class Block_9718916346579a1a0e739a5_60493182 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_9718916346579a1a0e739a5_60493182',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Title<?php
}
}
/* {/block 'title'} */
/* {block "additional"} */
class Block_16616446056579a1a0e82cb7_36272041 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'additional' => 
  array (
    0 => 'Block_16616446056579a1a0e82cb7_36272041',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "additional"} */
/* {block 'body'} */
class Block_17554878656579a1a0e84958_99581535 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17554878656579a1a0e84958_99581535',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Default Body<?php
}
}
/* {/block 'body'} */
/* {block 'component'} */
class Block_12607279586579a1a0e866e9_75897832 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'component' => 
  array (
    0 => 'Block_12607279586579a1a0e866e9_75897832',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'component'} */
}
