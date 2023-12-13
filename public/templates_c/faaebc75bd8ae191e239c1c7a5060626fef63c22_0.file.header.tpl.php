<?php
/* Smarty version 4.3.4, created on 2023-12-12 07:54:32
  from 'D:\wamp64\www\MVC\app\views\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_657811b896c5d3_09608497',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'faaebc75bd8ae191e239c1c7a5060626fef63c22' => 
    array (
      0 => 'D:\\wamp64\\www\\MVC\\app\\views\\header.tpl',
      1 => 1702304240,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_657811b896c5d3_09608497 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
    <head>
        <title><?php echo (($tmp = $_smarty_tpl->tpl_vars['title']->value ?? null)===null||$tmp==='' ? "no title" ?? null : $tmp);?>
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
<header>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
            <a class="navbar-brand" href="http://localhost/MVC/public/">Library</a>
            </div>
            <ul class="nav navbar-nav">
            <li class="active"><a href="http://localhost/MVC/public/">Home</a></li>
            <?php if (!(isset($_smarty_tpl->tpl_vars['login']->value)) || $_smarty_tpl->tpl_vars['login']->value == 0) {?>
                <li><a href="http://localhost/MVC/public/pages/login/login_view">Login</a></li>
            <?php } elseif ($_smarty_tpl->tpl_vars['login']->value == 1 && $_smarty_tpl->tpl_vars['user_type']->value == 0) {?>
                <li><a  href="http://localhost/MVC/public/pages/addbook/add_book_view">Add Book</a></li>
                <li><a href="http://localhost/MVC/public/services/logout">Logout</a></li>
            <?php } else { ?>
                <li><a @click="borrowed_books()">Borrowed Books</a></li>
                <li><a href="http://localhost/MVC/public/services/logout">Logout</a></li>
            <?php }?>
            </ul>
            <form class="navbar-form navbar-left" action="search" method="post">
            <div class="form-group">
                <input type="text" class="form-control" name = "book_title" placeholder="Search For Book" v-model="sbook_title">
            </div>
            <button type="submit" class="btn" style="margin-left: 4px;">Search</button>
            </form>
        </div>
    </nav>
</header>        <?php }
}
