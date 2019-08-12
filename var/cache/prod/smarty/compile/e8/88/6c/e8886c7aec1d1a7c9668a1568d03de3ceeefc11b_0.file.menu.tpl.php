<?php
/* Smarty version 3.1.33, created on 2019-08-12 14:19:38
  from 'C:\xampp\htdocs\siscitas\modules\ps_faviconnotificationbo\views\templates\admin\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d51bbca82e336_22944819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e8886c7aec1d1a7c9668a1568d03de3ceeefc11b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\siscitas\\modules\\ps_faviconnotificationbo\\views\\templates\\admin\\menu.tpl',
      1 => 1565637553,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:./tabs/faviconConfiguration.tpl' => 1,
  ),
),false)) {
function content_5d51bbca82e336_22944819 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div id="modulecontent" class="clearfix">
    <div id="faviconbo-menu">
        <div class="col-lg-2">
            <div class="list-group" v-on:click.prevent>
                <a href="#" class="list-group-item" v-bind:class="{ 'active': isActive('faviconConfiguration') }" v-on:click="makeActive('faviconConfiguration')"><i class="fa fa-gavel"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Get started','d'=>'Modules.Faviconnotificationbo.Admin'),$_smarty_tpl ) );?>
</a>
            </div>
            <div class="list-group" v-on:click.prevent>
                <a class="list-group-item" style="text-align:center"><i class="icon-info"></i> <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['l'][0], array( array('s'=>'Version','d'=>'Admin.Global'),$_smarty_tpl ) );?>
 <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_version']->value,'htmlall','UTF-8' ));?>
 | <i class="icon-info"></i> PrestaShop <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ps_version']->value,'htmlall','UTF-8' ));?>
</a>
            </div>
        </div>
    </div>

        <div id="faviconConfiguration" class="faviconbo_menu addons-hide">
        <?php $_smarty_tpl->_subTemplateRender("file:./tabs/faviconConfiguration.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </div>

</div>


<?php echo '<script'; ?>
 type="text/javascript">
    var base_url = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['ps_base_dir']->value,'htmlall','UTF-8' ));?>
";
    var isPs17 = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['isPs17']->value,'htmlall','UTF-8' ));?>
";
    var currentPage = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['currentPage']->value,'htmlall','UTF-8' ));?>
";
    var moduleAdminLink = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['moduleAdminLink']->value,'htmlall','UTF-8' ));?>
";
    var moduleName = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['module_name']->value,'htmlall','UTF-8' ));?>
";
    var ps_version = "<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['isPs17']->value,'htmlall','UTF-8' ));?>
";
<?php echo '</script'; ?>
>

<?php }
}
