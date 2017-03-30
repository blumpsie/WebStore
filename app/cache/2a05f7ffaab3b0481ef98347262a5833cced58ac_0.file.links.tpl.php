<?php
/* Smarty version 3.1.30, created on 2017-03-30 13:21:18
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\links.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58dd3e8e6b2ab0_62423054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2a05f7ffaab3b0481ef98347262a5833cced58ac' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\links.tpl',
      1 => 1490894471,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58dd3e8e6b2ab0_62423054 (Smarty_Internal_Template $_smarty_tpl) {
?>
<li><a href="cart.php">Cart</a></li>

<?php if ($_smarty_tpl->tpl_vars['session']->value->login && !$_smarty_tpl->tpl_vars['session']->value->login->is_admin) {?>
    <li><a href="myOrders.php">My Orders</a></li>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['session']->value->login && $_smarty_tpl->tpl_vars['session']->value->login->is_admin) {?>
    <li><a href="allOrders.php">All Orders</a></li>
    <li><a href="addProduct.php">Add Product</a></li>
    <li><a href="addCategory.php">Add Category</a></li>
<?php }?>

<?php if ($_smarty_tpl->tpl_vars['session']->value->login) {?>
    <li><a href="logout.php">Logout</a></li>
<?php } else { ?>
<li><a href="login.php">Login</a></li>
<?php }
}
}
