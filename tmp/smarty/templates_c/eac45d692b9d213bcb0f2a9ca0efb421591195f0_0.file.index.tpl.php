<?php
/* Smarty version 3.1.30-dev/57, created on 2016-03-15 12:13:49
  from "C:\xampp\htdocs\newnexus\views\default\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/57',
  'unifunc' => 'content_56e7ee6d924792_60734199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eac45d692b9d213bcb0f2a9ca0efb421591195f0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\newnexus\\views\\default\\index.tpl',
      1 => 1458040418,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56e7ee6d924792_60734199 (Smarty_Internal_Template $_smarty_tpl) {
?>


<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->_loop = true;
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
$__foreach_item_0_saved = $_smarty_tpl->tpl_vars['item'];
?>
    <?php if (empty($_smarty_tpl->tpl_vars['item']->value['image'])) {
$_tmp_array = isset($_smarty_tpl->tpl_vars['item']) ? $_smarty_tpl->tpl_vars['item']->value : array();
if (!is_array($_tmp_array) || $_tmp_array instanceof ArrayAccess) {
settype($_tmp_array, 'array');
}
$_tmp_array['image'] = 'placeholder.png';
$_smarty_tpl->_assignInScope('item', $_tmp_array);
}?>
    <div class="product">
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/">
            <img src="/image/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" width="100" /></a>
            <br />
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a>
    </div>
        <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 2 == 0) {?>
            <div style="clear: both"></div>
        <?php }
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
}
}
