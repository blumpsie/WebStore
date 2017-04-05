<?php
/* Smarty version 3.1.30, created on 2017-04-04 09:15:06
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\allOrders.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e39c5a5258b9_99524012',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c299cf7b6f7350c73f849dea912d0a78ff91e195' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\allOrders.tpl',
      1 => 1491311703,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58e39c5a5258b9_99524012 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_150243155558e39c5a4ce4c3_94497501', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_26162496958e39c5a522b51_53786728', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_150243155558e39c5a4ce4c3_94497501 extends Smarty_Internal_Block
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
class Block_26162496958e39c5a522b51_53786728 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h2>All Orders</h2>
    <table class="table table-condensed">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
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
                <td>for:<?php echo $_smarty_tpl->tpl_vars['order']->value->user->name;?>
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
