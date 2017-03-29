<?php
/* Smarty version 3.1.30, created on 2017-03-29 17:55:47
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58dc2d63078d71_33566591',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0a5ed4b7fcecfbc8fce93b8ab9f037464333d1e' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\cart.tpl',
      1 => 1489495052,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58dc2d63078d71_33566591 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_29010485758dc2d630745b5_81755816', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "content"} */
class Block_29010485758dc2d630745b5_81755816 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h2>My Cart</h2>

<pre>
<?php echo print_r($_smarty_tpl->tpl_vars['cart_info']->value,true);?>
  

total = <?php echo $_smarty_tpl->tpl_vars['total_price']->value;?>

</pre>

<?php
}
}
/* {/block "content"} */
}
