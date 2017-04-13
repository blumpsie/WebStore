<?php
/* Smarty version 3.1.30, created on 2017-04-13 08:55:15
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ef7533e6c269_40577290',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0a5ed4b7fcecfbc8fce93b8ab9f037464333d1e' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\cart.tpl',
      1 => 1492088113,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58ef7533e6c269_40577290 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_167099585058ef7533dd66c2_67103809', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11387411258ef7533e68979_54189579', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_167099585058ef7533dd66c2_67103809 extends Smarty_Internal_Block
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
class Block_11387411258ef7533e68979_54189579 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="top">
    <h2>My Cart</h2>
</div>
    <?php if (!$_smarty_tpl->tpl_vars['hasItems']->value) {?>
            <h1><strong>EMPTY CART!!!</strong></h1>
    <?php } else { ?>
    <table class="table table-hover table-condensed">
        <tr>
            <td>Name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Per-Product Subtotal</td>
        </tr>
        
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart_info']->value, 'value', false, 'key');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
?>
         <tr>
            <td><a href="productSelect.php?product_id=<?php echo $_smarty_tpl->tpl_vars['key']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['value']->value['name'];?>
</a></td> 
            <td>$<?php echo number_format($_smarty_tpl->tpl_vars['value']->value['price'],2,".",'');?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['value']->value['quantity'];?>
</td>
            <td>$<?php echo number_format($_smarty_tpl->tpl_vars['value']->value['subtotal'],2,".",'');?>
</td>
         </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

        <tr>
            <td>Total:</td>
            <td></td>
            <td></td>
            <td>$<?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,".",'');?>
</td>
        </tr>
        <?php if ($_smarty_tpl->tpl_vars['session']->value->login) {?>
        <tr>
            <td>
                <form action="placeOrder.php">
                    <button type="submit">Place Order</button>
                </form>
            </td>
        </tr>
        <?php }?>
        <?php }?>
    </table>

<?php
}
}
/* {/block "content"} */
}
