<?php
/* Smarty version 3.1.30, created on 2017-04-06 13:29:58
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\addCategory.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58e67b1662f717_29383717',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ec85d2a89cbab99cdb341be9ac297f2b1ed72af2' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\addCategory.tpl',
      1 => 1491499795,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58e67b1662f717_29383717 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>



<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_207784965758e67b165ab583_90743460', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_86226837758e67b1662c211_55208180', "content");
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_207784965758e67b165ab583_90743460 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <style type="text/css">
        td:first-child{
            width: 10px;
        }
        td {
            border: none ! important;
        }
    </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_86226837758e67b1662c211_55208180 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h2>Add Category</h2>
    
    <form action="addCategoryReentrant.php" method="post">
        <table class="table table-condensed">
            <tr>
                <td>
                    <h4>
                        <strong>
                            Current Categories:
                        </strong>
                    </h4>
                </td>
            <tr>
                <td>
                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['categories']->value, 'category');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['category']->value) {
?>
                        -- <strong><?php echo $_smarty_tpl->tpl_vars['category']->value;?>
</strong>
                        <br />
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                </td>
            </tr>
            </tr>
            <tr>
                <td>Name of Category:</td>
                <td>
                    <input class="form-control" type="text" name="name"
                           value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['name']->value, ENT_QUOTES, 'UTF-8', true);?>
" />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <button type="submit" name="addit">Add</button>
                    <button type="submit" name="cancel">Cancel</button>
                </td>
            </tr>
        </table>
    </form>
                           <h4 id="message"><?php echo (($tmp = @$_smarty_tpl->tpl_vars['message']->value)===null||$tmp==='' ? '' : $tmp);?>
</h4>
<?php
}
}
/* {/block "content"} */
}
