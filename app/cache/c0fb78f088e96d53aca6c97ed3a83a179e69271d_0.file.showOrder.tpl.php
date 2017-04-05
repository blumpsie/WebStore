<?php
/* Smarty version 3.1.30, created on 2017-04-05 13:49:43
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\showOrder.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e52e37eb0264_88361535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0fb78f088e96d53aca6c97ed3a83a179e69271d' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\showOrder.tpl',
      1 => 1491414580,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58e52e37eb0264_88361535 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_session_get_flash')) require_once 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\include\\myplugins\\function.session_get_flash.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19978347558e52e37da8a66_40867375', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_107339659658e52e37eaccb4_66961520', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_19978347558e52e37da8a66_40867375 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style type="text/css">
        .top { 
      margin-bottom: 20px; 
    }
    .top h2 { 
      display: inline-block;
      margin: 0 30px 0 0;
      vertical-align: bottom;
    }
    .top form {
      display: inline-block;
      vertical-align: bottom;
    }
    </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_107339659658e52e37eaccb4_66961520 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <div class="top">
        <h2>Order #<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</h2>
        <?php if ($_smarty_tpl->tpl_vars['session']->value->login->is_admin) {?>
        <br />
        <br />
        User:<?php echo $_smarty_tpl->tpl_vars['order']->value->user->name;?>

        <br />
        Email:<?php echo $_smarty_tpl->tpl_vars['order']->value->user->email;?>

        <?php }?>
    </div>
        
    <table class="table table-hover table-condensed">
        <tr>
            <td>Name</td>
            <td>Id</td>
            <td>Category</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['selections']->value, 'selection');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['selection']->value) {
?>
            <tr>
                <td><a href="productSelect.php?product_id=<?php echo $_smarty_tpl->tpl_vars['selection']->value->product->id;?>
">
                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selection']->value->product->name, ENT_QUOTES, 'UTF-8', true);?>

                </td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selection']->value->product->id, ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['selection']->value->product->category->name, ENT_QUOTES, 'UTF-8', true);?>
</td>
                <td>$<?php echo number_format(htmlspecialchars($_smarty_tpl->tpl_vars['selection']->value->product->price, ENT_QUOTES, 'UTF-8', true),2,'.','');?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['selection']->value->quantity;?>
</td>
                <td>$<?php echo number_format(htmlspecialchars($_smarty_tpl->tpl_vars['subtotals']->value[$_smarty_tpl->tpl_vars['selection']->value->id], ENT_QUOTES, 'UTF-8', true),2,'.','');?>
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
            <td></td>
            <td></td>
            <td>$<?php echo number_format($_smarty_tpl->tpl_vars['total']->value,2,'.','');?>
</td>
        </tr>
    </table>
    
    <?php if ($_smarty_tpl->tpl_vars['session']->value->login->is_admin) {?>
    <div class='action'>
        <form action='removeOrder.php' method='get'>
            <input type='hidden' name='order_id' value='<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
'>
            <button type='submit'>
                <?php ob_start();
echo smarty_function_session_get_flash(array('var'=>'button_title'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo (($tmp = @$_prefixVariable1)===null||$tmp==='' ? 'Remove' : $tmp);?>

            </button>
            <input type='hidden' name='confirm'
                   value='<?php echo smarty_function_session_get_flash(array('var'=>'confirm'),$_smarty_tpl);?>
' />
        </form>
    </div>
    <?php }
}
}
/* {/block "content"} */
}
