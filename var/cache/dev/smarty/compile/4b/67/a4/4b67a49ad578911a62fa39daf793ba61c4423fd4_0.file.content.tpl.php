<?php
/* Smarty version 3.1.33, created on 2019-08-14 19:58:55
  from 'C:\xampp\htdocs\siscitas\admincitas\themes\new-theme\template\content.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d54ae4f7d67e8_93441386',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4b67a49ad578911a62fa39daf793ba61c4423fd4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\siscitas\\admincitas\\themes\\new-theme\\template\\content.tpl',
      1 => 1565636009,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d54ae4f7d67e8_93441386 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="ajax_confirmation" class="alert alert-success" style="display: none;"></div>


<?php if (isset($_smarty_tpl->tpl_vars['content']->value)) {?>
  <?php echo $_smarty_tpl->tpl_vars['content']->value;?>

<?php }
}
}
