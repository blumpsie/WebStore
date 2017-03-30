<?php
/* Smarty version 3.1.30, created on 2017-03-30 13:13:35
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58dd3cbfa93a47_91796731',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd2ccfc31c346dc7b5c30c3031779e94bf50f0d77' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\login.tpl',
      1 => 1487962594,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_58dd3cbfa93a47_91796731 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_session_get_flash')) require_once 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\include\\myplugins\\function.session_get_flash.php';
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>




<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8863413758dd3cbf422676_02741727', "localstyle");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13279188958dd3cbfa90e72_81560494', "content");
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block "localstyle"} */
class Block_8863413758dd3cbf422676_02741727 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <style>
    th {
      width: 10px;
    }
    th, td {
      border: none ! important;
    }
  </style>
<?php
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_13279188958dd3cbfa90e72_81560494 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

  <h2>Login</h2>

  <p>Please enter access information</p>
  
  <form action="validate.php" method="post" autocomplete="off">
    <table class="table table-condensed">
      <tr>
        <th>user:</th>
        <td><input class="form-control" type="text" name="username" autofocus="on"
                   value="<?php ob_start();
echo smarty_function_session_get_flash(array('var'=>'username'),$_smarty_tpl);
$_prefixVariable1=ob_get_clean();
echo htmlspecialchars($_prefixVariable1, ENT_QUOTES, 'UTF-8', true);?>
" /></td>
      </tr>
      <tr>
        <th>password:</th>
        <td><input class="form-control" type="password" name="password" /></td>
      </tr>
      <tr>
        <td></td>
        <td><button type="submit">Access</button></td>
      </tr>
    </table>

  </form>

  <h4 id="message"><?php echo smarty_function_session_get_flash(array('var'=>'message'),$_smarty_tpl);?>
</h4>
<?php
}
}
/* {/block "content"} */
}
