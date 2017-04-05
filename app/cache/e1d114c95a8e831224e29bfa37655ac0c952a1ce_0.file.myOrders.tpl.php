<?php
/* Smarty version 3.1.30, created on 2017-04-05 12:04:54
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\myOrders.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e515a6c76746_55202234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e1d114c95a8e831224e29bfa37655ac0c952a1ce' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\myOrders.tpl',
      1 => 1491408292,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58e515a6c76746_55202234 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4590762958e515a6c2a523_42675286', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_148667240858e515a6c736d6_80703078', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_4590762958e515a6c2a523_42675286 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style type="text/css">
        td:first-child{
            width: 10px;
        }
        td{
            border: none ! important;
        }
    </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_148667240858e515a6c736d6_80703078 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h2>My Orders</h2>
    <table class="table table-condensed">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userOrders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
            <tr>
                <td>
                    <a href="showOrder.php?order_id=<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
                    Order #<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>

                    </a>
                </td>
                <td>Time Placed:<?php echo $_smarty_tpl->tpl_vars['order']->value->created_at;?>
</td>
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

    </table>
<?php
}
}
/* {/block "content"} */
}
