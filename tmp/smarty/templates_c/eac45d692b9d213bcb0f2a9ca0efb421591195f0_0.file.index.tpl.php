<?php
/* Smarty version 3.1.30-dev/57, created on 2016-03-16 21:11:01
  from "C:\xampp\htdocs\newnexus\views\default\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/57',
  'unifunc' => 'content_56e9bdd5f383e5_02499321',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eac45d692b9d213bcb0f2a9ca0efb421591195f0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\newnexus\\views\\default\\index.tpl',
      1 => 1458159054,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e9bdd5f383e5_02499321 (Smarty_Internal_Template $_smarty_tpl) {
?>



<ul class="small-block-grid-1 medium-block-grid-3 large-block-grid-5">
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
));
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$__foreach_item_0_saved = $_smarty_tpl->tpl_vars['item'];
?>
    <?php if (empty($_smarty_tpl->tpl_vars['item']->value['image'])) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['image'] = 'ph.jpg';
$_smarty_tpl->_assignInScope('item', $_tmp_array);
}?>
    <li class="medium-text-center small-text-center">
        
        <a class="" href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
            <img class="" src="/image/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" /></a>
            <br />
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a><br />
        <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="button expand" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);return false;" href="#" alt="">В корзину</a>
        
    </li>
        
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</ul>

<a href="#" data-reveal-id="myModal">Click Me For A Modal</a>

<div id="myModal" class="reveal-modal tiny" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
    <form>
      <div class="row column log-in-form">
        <h4 class="text-center">Авторизация</h4>
        <label>Email
          <input type="text" placeholder="somebody@example.com">
        </label>
        <label>Пароль
          <input type="password" placeholder="Password">
        </label>
        <p><a type="submit" class="button expand">Войти</a></p>
        <p class="text-center"><a href="#">Забыли пароль?</a></p>   
      </div>
    </form>


  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
<?php }
}
