<?php
/* Smarty version 4.3.4, created on 2023-12-12 14:29:48
  from 'D:\wamp64\www\MVC\app\views\partials\book_component.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.4',
  'unifunc' => 'content_65786e5c7243f2_99745819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd6131ac78db73a36cbec2ab93a6391d4f5131861' => 
    array (
      0 => 'D:\\wamp64\\www\\MVC\\app\\views\\partials\\book_component.tpl',
      1 => 1702389923,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_65786e5c7243f2_99745819 (Smarty_Internal_Template $_smarty_tpl) {
?><template id="book_template">
    <div class="col-sm-4 rounded-lg bg-success">
        <div> 
            <img class="img-fluid" width="200" :src="book.img_url" style="text-align: center;">
        </div>
    </div>
    <div class="col-sm-8">
        <h2>{{ book.title }}</h2>
        <p class="light-text">{{ book.description }}</p>
        <?php if ($_smarty_tpl->tpl_vars['login']->value == 1 && $_smarty_tpl->tpl_vars['user_type']->value == 1) {?>
            <input v-if = "page == 0 && book.is_current_user == 0 && book.current_borrow < book.max_num" type="button" @click="borrow($event)" :data-id = "book.id" value="Borrow">  
            <input  v-if = "page == 1 || book.is_current_user == 1" type="button" @click="return_book($event, index)" :data-id = "book.id" value="Return">    
            <input  v-if = "page == 0 && book.is_current_user == 0 && book.current_borrow >= book.max_num" type="text" :data-id = "book.id" value="Not Available" disabled>                                                 
        <?php }?>
    </div>

</template><?php }
}
