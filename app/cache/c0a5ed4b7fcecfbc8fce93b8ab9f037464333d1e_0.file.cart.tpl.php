<?php
/* Smarty version 3.1.30, created on 2017-04-05 13:57:19
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e52fff967069_12868780',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0a5ed4b7fcecfbc8fce93b8ab9f037464333d1e' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\cart.tpl',
      1 => 1491415036,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58e52fff967069_12868780 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_165895518958e52fff911c01_96051249', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_178316215058e52fff964080_61108596', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_165895518958e52fff911c01_96051249 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style type="text/css">
        .top{
            margin-bottom: 20px;
        }
        .top h2{
            display: inline-block;
            margin: 0 30px 0 0;
            vertical-align: bottom;
        }
        .top form{
            display: inline-block;
            vertical-align: bottom;
        }
    </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_178316215058e52fff964080_61108596 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="top">
    <h2>My Cart</h2>
</div>
    
    <table class="table table-hover table-condensed">
        <tr>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Per-Product Subtotal</th>
        </tr>
        <tr>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart_info']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
                <td><a href="productSelect.php?product_id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</a></td> 
                <td>$<?php echo $_smarty_tpl->tpl_vars['value']->value['price'];?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['value']->value['quantity'];?>
</td>
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        </tr>
        
    </table>

<?php
}
}
/* {/block "content"} */
}
