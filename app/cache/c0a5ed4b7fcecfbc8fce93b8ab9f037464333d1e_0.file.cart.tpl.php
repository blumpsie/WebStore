<?php
/* Smarty version 3.1.30, created on 2017-04-05 12:02:17
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e51509142904_49829438',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0a5ed4b7fcecfbc8fce93b8ab9f037464333d1e' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\cart.tpl',
      1 => 1491258361,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58e51509142904_49829438 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_124015552158e51509136715_54081377', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_183853012858e5150913eb11_52104258', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_124015552158e51509136715_54081377 extends Smarty_Internal_Block
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
class Block_183853012858e5150913eb11_52104258 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="top">
    <h2>My Cart</h2>
</div>
    
    <table class="table table-hover table-condensed">
        <tr>
            <th>Name</th>
            <th>Category</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Per-Product Subtotal</th>
        </tr>
        
    </table>

<?php
}
}
/* {/block "content"} */
}
