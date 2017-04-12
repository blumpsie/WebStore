<?php
/* Smarty version 3.1.30, created on 2017-04-11 08:38:40
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\productSelect.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ecce501cc385_96191892',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9936d4651f850db88d1042c6f5a3d9c42595afc0' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\productSelect.tpl',
      1 => 1491913916,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58ecce501cc385_96191892 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\include\\libs\\plugins\\function.html_options.php';
if (!is_callable('smarty_function_session_get_flash')) require_once 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\include\\myplugins\\function.session_get_flash.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_55748438358ecce500d2178_78649569', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_49414001058ecce501c8560_35106157', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_55748438358ecce500d2178_78649569 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <style>
    .product img { 
      float: right; 
    }
    .product ul {
      padding-left: 20px;
    }
  </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_49414001058ecce501c8560_35106157 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h2><?php echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value->name, ENT_QUOTES, 'UTF-8', true);?>
</h2>

  <p>
    Product id: <?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>

    <br />
    Price: <b>$<?php echo number_format($_smarty_tpl->tpl_vars['product']->value->price,2);?>
</b>
  </p>

  <div class="product">
    <?php if ($_smarty_tpl->tpl_vars['product']->value->photo->id != 0) {?>
      <img class="img-responsive" src="img/products/<?php echo $_smarty_tpl->tpl_vars['product']->value->photo->name;?>
" />
    <?php }?>
    <?php echo $_smarty_tpl->tpl_vars['product']->value->description;?>

  </div>

  <div class="action">
    <?php if (!$_smarty_tpl->tpl_vars['session']->value->login || !$_smarty_tpl->tpl_vars['session']->value->login->is_admin) {?>
        <form action="cart.php" method="get">
          <input type='hidden' name='product_id' value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
          <b>Selected quantity</b>
          <br />
          <select name="quantity">
              <?php echo smarty_function_html_options(array('options'=>$_smarty_tpl->tpl_vars['quantities']->value,'selected'=>$_smarty_tpl->tpl_vars['quantity']->value),$_smarty_tpl);?>

          </select>
          <button type="submit">Change Quantity</button>
        </form>
    <?php } else { ?>
        <form action="modifyProduct.php" method="get">
            <input type="hidden" name="product_id" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
            <button type="submit">Modify</button>
        </form>
        
        <form action="removeProduct.php" method="get">
            <input type='hidden' name='product_id' value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" />
            <button type="submit">
                <?php ob_start();
echo smarty_function_session_get_flash(array('var'=>'button_title'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo (($tmp = @$_prefixVariable1)===null||$tmp==='' ? 'Remove' : $tmp);?>

            </button>
            <input type='hidden' name='confirm'
                   value='<?php echo smarty_function_session_get_flash(array('var'=>'confirm'),$_smarty_tpl);?>
' />
        </form>
    <?php }?>
  </div>

  <h4 id='message'>
    <?php echo smarty_function_session_get_flash(array('var'=>'message'),$_smarty_tpl);?>
    
  </h4>

<?php
}
}
/* {/block "content"} */
}
