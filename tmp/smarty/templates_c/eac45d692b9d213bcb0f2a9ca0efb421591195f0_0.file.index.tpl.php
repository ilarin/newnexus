<?php
/* Smarty version 3.1.30-dev/57, created on 2016-03-18 14:41:41
  from "C:\xampp\htdocs\newnexus\views\default\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30-dev/57',
  'unifunc' => 'content_56ec059525bcd7_75863350',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eac45d692b9d213bcb0f2a9ca0efb421591195f0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\newnexus\\views\\default\\index.tpl',
      1 => 1458308463,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_56ec059525bcd7_75863350 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="small-12 columns">
<div class="row" style="margin-top: 16px;margin-bottom: 16px;">

    <div class="small-6 columns">
    
        <div><h4>Хиты продаж</h4></div>
    
    </div>
    <div class="small-6 columns small-text-right">
        <a href=""><h4>Показать все</h4></a>
    </div>
    <hr />

</div>

<div class="sliderProduct" data-equalizer >
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
    <div class="sliderPro" style="" data-equalizer-watch>
        
        
        
          <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="button expand" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);return false;">В корзину</a>
          <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><img src="/image/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
"></a>
        
        <a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><h3><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</h3></a>
        <h5><?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
 р.</h5>
        
      
        
    </div>
        
<?php
$_smarty_tpl->tpl_vars['item'] = $__foreach_item_0_saved;
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
</div>
</div>







<?php }
}
