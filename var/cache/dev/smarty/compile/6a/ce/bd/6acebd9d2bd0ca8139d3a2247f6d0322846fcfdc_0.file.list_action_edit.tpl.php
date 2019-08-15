<?php
/* Smarty version 3.1.33, created on 2019-08-14 20:03:22
  from 'C:\xampp\htdocs\siscitas\admincitas\themes\default\template\helpers\list\list_action_edit.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d54af5a1c3322_28761434',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6acebd9d2bd0ca8139d3a2247f6d0322846fcfdc' => 
    array (
      0 => 'C:\\xampp\\htdocs\\siscitas\\admincitas\\themes\\default\\template\\helpers\\list\\list_action_edit.tpl',
      1 => 1565636010,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d54af5a1c3322_28761434 (Smarty_Internal_Template $_smarty_tpl) {
?><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['href']->value,'html','UTF-8' ));?>
" title="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>
" class="edit">
	<i class="icon-pencil"></i> <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['action']->value,'html','UTF-8' ));?>

</a>
<?php }
}
