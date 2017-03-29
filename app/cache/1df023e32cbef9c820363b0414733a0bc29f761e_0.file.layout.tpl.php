<?php
/* Smarty version 3.1.30, created on 2017-03-29 16:28:40
  from "C:\Users\Blumpsie\Documents\User Interfaces - CSC 417\WebStore\templates\layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58dc18f89e0725_07803142',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1df023e32cbef9c820363b0414733a0bc29f761e' => 
    array (
      0 => 'C:\\Users\\Blumpsie\\Documents\\User Interfaces - CSC 417\\WebStore\\templates\\layout.tpl',
      1 => 1490025912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:links.tpl' => 1,
  ),
),false)) {
function content_58dc18f89e0725_07803142 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>  
      <?php echo (($tmp = @$_smarty_tpl->tpl_vars['page_title']->value)===null||$tmp==='' ? basename(dirname($_SERVER['PHP_SELF'])) : $tmp);?>

    </title>
    
    <?php echo '<script'; ?>
 type="text/javascript">
    // for Safari browser, deal with back button
    window.onpageshow = function (event) {
      if (event.persisted) {
        window.location.reload();
      }
    };
    <?php echo '</script'; ?>
>

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/layout.css" rel="stylesheet" />

  <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_173586678058dc18f89cb905_08389308', "localstyle");
?>

</head>
<body>     
  <header>
    <div>
      <img class="img-responsive" src="img/header.png" />
      <span class='login'><?php echo (($tmp = @$_smarty_tpl->tpl_vars['session']->value->login->name)===null||$tmp==='' ? '' : $tmp);?>
</span>
    </div>
    <nav class="navbar navbar-default">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" 
                  class="navbar-toggle collapsed" 
                  data-toggle="collapse" 
                  data-target="#toggleMenu">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href=".">Home</a>
        </div>

        <div class="collapse navbar-collapse" 
             id="toggleMenu">
          <ul class="nav navbar-nav">
            <?php $_smarty_tpl->_subTemplateRender("file:links.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

          </ul>
        </div>
      </div>
    </nav>
  </header>

  <section class="container-fluid"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_26049042558dc18f89dde99_45449812', "content");
?>
</section>

  <?php echo '<script'; ?>
 src="js/jquery.min.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
 src="js/bootstrap.min.js"><?php echo '</script'; ?>
>
</body>
</html>
<?php }
/* {block "localstyle"} */
class Block_173586678058dc18f89cb905_08389308 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "localstyle"} */
/* {block "content"} */
class Block_26049042558dc18f89dde99_45449812 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "content"} */
}
